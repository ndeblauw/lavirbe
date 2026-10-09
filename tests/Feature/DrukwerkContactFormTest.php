<?php

use App\Models\Contact;
use App\Notifications\NewContactSubmission;
use Illuminate\Support\Facades\Notification;
use Spatie\Honeypot\EncryptedTime;

/**
 * @param  array<string, mixed>  $overrides
 * @return array<string, mixed>
 */
function drukwerkPayload(array $overrides = []): array
{
    return array_merge([
        'name' => 'Jan Jansen',
        'email' => 'jan@example.com',
        'phone' => '0470 12 34 56',
        'subject' => 'Stickers',
        'quantity' => 25,
        'message' => 'Graag een voorstel voor 25 pins.',
        'website' => '',
        'valid_from' => (string) EncryptedTime::create(now()->subSeconds(5)),
    ], $overrides);
}

test('the offerte form page is reachable on the drukwerk subdomain', function () {
    $this->get(route('drukwerk.contact.create'))
        ->assertOk()
        ->assertSee('Offerte aanvraag', false);
});

test('stores a legitimate drukwerk submission as a drukwerk contact', function () {
    $this->post(route('drukwerk.contact.store'), drukwerkPayload())
        ->assertRedirect()
        ->assertSessionHas('success');

    $contact = Contact::first();

    expect($contact)->not->toBeNull()
        ->and($contact->type)->toBe(Contact::TYPE_DRUKWERK)
        ->and($contact->phone)->toBe('0470 12 34 56')
        ->and($contact->quantity)->toBe(25)
        ->and($contact->subject)->toBe('Stickers')
        ->and($contact->is_spam)->toBeFalse()
        ->and($contact->spam_reason)->toBeNull();
});

test('notifies info@lavir.be about a legitimate offerte submission', function () {
    Notification::fake();

    $this->post(route('drukwerk.contact.store'), drukwerkPayload())->assertRedirect();

    Notification::assertSentOnDemand(
        NewContactSubmission::class,
        function (NewContactSubmission $notification, array $channels, $notifiable) {
            return $notification->contact->type === Contact::TYPE_DRUKWERK
                && $notifiable->routes['mail'] === 'info@lavir.be';
        },
    );
});

test('does not notify about a spam offerte submission', function () {
    Notification::fake();

    $this->post(route('drukwerk.contact.store'), drukwerkPayload(['website' => 'http://spam.example']))->assertRedirect();

    Notification::assertNothingSent();
});

test('flags drukwerk submissions that fill the honeypot field', function () {
    $this->post(route('drukwerk.contact.store'), drukwerkPayload(['website' => 'http://spam.example']))
        ->assertRedirect();

    $contact = Contact::first();

    expect($contact->is_spam)->toBeTrue()
        ->and($contact->spam_reason)->toBe('honeypot');
});

test('flags drukwerk submissions that arrive too quickly', function () {
    $this->post(route('drukwerk.contact.store'), drukwerkPayload([
        'valid_from' => (string) EncryptedTime::create(now()->addSeconds(10)),
    ]))->assertRedirect();

    expect(Contact::first()->is_spam)->toBeTrue();
});

test('flags drukwerk submissions with missing honeypot fields', function () {
    $payload = drukwerkPayload();
    unset($payload['website'], $payload['valid_from']);

    $this->post(route('drukwerk.contact.store'), $payload)->assertRedirect();

    expect(Contact::first()->is_spam)->toBeTrue();
});

test('rate limits drukwerk submissions per ip', function () {
    foreach (range(1, 3) as $ignored) {
        $this->post(route('drukwerk.contact.store'), drukwerkPayload())->assertRedirect();
    }

    $this->post(route('drukwerk.contact.store'), drukwerkPayload())->assertStatus(429);
});

test('rejects a product outside the rendered product list', function () {
    $this->post(route('drukwerk.contact.store'), drukwerkPayload(['subject' => 'Niet in de lijst']))
        ->assertSessionHasErrors('subject');

    expect(Contact::count())->toBe(0);
});

test('validates the required drukwerk submission fields', function () {
    $this->post(route('drukwerk.contact.store'))
        ->assertSessionHasErrors(['name', 'email', 'subject', 'quantity']);

    expect(Contact::count())->toBe(0);
});

test('accepts the catch-all other product', function () {
    $this->post(route('drukwerk.contact.store'), drukwerkPayload(['subject' => 'andere']))
        ->assertRedirect()
        ->assertSessionHasNoErrors();
});

test('the offerte page does not load the third-party widget', function () {
    $this->get(route('drukwerk.contact.create'))
        ->assertOk()
        ->assertDontSee('popup.print.com', false);
});
