<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:3', 'max:255'],
            'subject' => ['required', 'string', 'min:3', 'max:255'],
            'message' => ['nullable', 'string', 'max:5000'],
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Bedankt voor je bericht! Ik neem zo snel mogelijk contact met je op.');
    }
}
