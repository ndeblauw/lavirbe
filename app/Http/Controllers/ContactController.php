<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\DetectsHoneypotSpam;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Honeypot\SpamProtection;

class ContactController extends Controller
{
    use DetectsHoneypotSpam;

    public function create(): View
    {
        return view('contact.create', [
            'seo' => config('seo.pages.contact'),
        ]);
    }

    public function store(ContactRequest $request, SpamProtection $spamProtection): RedirectResponse
    {
        $isSpam = $this->isSpam($request, $spamProtection);

        Contact::create([
            ...$request->validated(),
            'type' => Contact::TYPE_LAVIR,
            'is_spam' => $isSpam,
            'spam_reason' => $isSpam ? 'honeypot' : null,
        ]);

        return redirect()->back()->with('success', 'Bedankt voor je bericht! Ik neem zo snel mogelijk contact met je op.');
    }
}
