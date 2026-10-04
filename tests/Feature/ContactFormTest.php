<?php

use App\Models\Contact;
use App\Models\User;
use Spatie\Honeypot\EncryptedTime;

/**
 * @param  array<string, mixed>  $overrides
 * @return array<string, mixed>
 */
function contactPayload(array $overrides = []): array
{
    return array_merge([
        'name' => 'Jan Jansen',
        'email' => 'jan@example.com',
        'subject' => 'Een vraag',
        'message' => 'Hallo, ik heb een vraag.',
        'website' => '',
        'valid_from' => (string) EncryptedTime::create(now()->subSeconds(5)),
    ], $overrides);
}

/**
 * @param  array<string, mixed>  $overrides
 */
function makeContact(array $overrides = []): Contact
{
    return Contact::create(array_merge([
        'name' => 'Jan Jansen',
        'email' => 'jan@example.com',
        'subject' => 'Een vraag',
        'message' => 'Hallo, ik heb een vraag.',
        'is_spam' => false,
    ], $overrides));
}

it('stores a legitimate contact submission', function () {
    $this->post(route('contact.store'), contactPayload())
        ->assertRedirect()
        ->assertSessionHas('success');

    $contact = Contact::first();

    expect($contact)->not->toBeNull()
        ->and($contact->is_spam)->toBeFalse()
        ->and($contact->spam_reason)->toBeNull();
});

it('flags submissions that fill the honeypot field', function () {
    $this->post(route('contact.store'), contactPayload(['website' => 'http://spam.example']))
        ->assertRedirect()
        ->assertSessionHas('success');

    $contact = Contact::first();

    expect($contact->is_spam)->toBeTrue()
        ->and($contact->spam_reason)->toBe('honeypot');
});

it('flags submissions that arrive too quickly', function () {
    $this->post(route('contact.store'), contactPayload([
        'valid_from' => (string) EncryptedTime::create(now()->addSeconds(10)),
    ]))->assertRedirect();

    expect(Contact::first()->is_spam)->toBeTrue();
});

it('flags submissions with missing honeypot fields', function () {
    $payload = contactPayload();
    unset($payload['website'], $payload['valid_from']);

    $this->post(route('contact.store'), $payload)->assertRedirect();

    expect(Contact::first()->is_spam)->toBeTrue();
});

it('rate limits contact submissions per ip', function () {
    foreach (range(1, 3) as $ignored) {
        $this->post(route('contact.store'), contactPayload())->assertRedirect();
    }

    $this->post(route('contact.store'), contactPayload())->assertStatus(429);
});

it('hides spam from the admin inbox by default', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $legitimate = makeContact(['email' => 'legit@example.com']);
    $spam = makeContact(['email' => 'spam@example.com', 'is_spam' => true, 'spam_reason' => 'honeypot']);

    $this->actingAs($admin)
        ->get(route('admin.contacts.index'))
        ->assertOk()
        ->assertSee($legitimate->email)
        ->assertDontSee($spam->email);
});

it('shows only spam in the admin when requested', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $legitimate = makeContact(['email' => 'legit@example.com']);
    $spam = makeContact(['email' => 'spam@example.com', 'is_spam' => true, 'spam_reason' => 'honeypot']);

    $this->actingAs($admin)
        ->get(route('admin.contacts.index', ['spam' => 1]))
        ->assertOk()
        ->assertSee($spam->email)
        ->assertDontSee($legitimate->email);
});
