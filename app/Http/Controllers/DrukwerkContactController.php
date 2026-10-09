<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\DetectsHoneypotSpam;
use App\Http\Requests\DrukwerkContactRequest;
use App\Models\Contact;
use App\Notifications\NewContactSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Spatie\Honeypot\SpamProtection;

class DrukwerkContactController extends Controller
{
    use DetectsHoneypotSpam;

    public function create(): View
    {
        return view('drukwerk.contact', [
            'products' => config('drukwerk.products'),
        ]);
    }

    public function store(DrukwerkContactRequest $request, SpamProtection $spamProtection): RedirectResponse
    {
        $isSpam = $this->isSpam($request, $spamProtection);

        $contact = Contact::create([
            ...$request->validated(),
            'type' => Contact::TYPE_DRUKWERK,
            'is_spam' => $isSpam,
            'spam_reason' => $isSpam ? 'honeypot' : null,
        ]);

        if (! $isSpam) {
            Notification::route('mail', 'info@lavir.be')
                ->notify(new NewContactSubmission($contact));
        }

        return redirect()->back()->with('success', 'Bedankt! Je offerteaanvraag is verstuurd. We bezorgen je zo snel mogelijk een voorstel.');
    }
}
