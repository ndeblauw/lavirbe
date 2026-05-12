<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        // validatie van gegevens
        $request->validate([
            'email' => ['required', 'string', 'email', 'min:3', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:255'],
        ]);

        // juiste actie uitvoeren
        // 1/ naar een admin
        $admin = User::where('is_admin', true)->firstOrFail();
        // 2/ de inhoud mailen
        Mail::to($admin)->send(new \App\Mail\ContactFormSubmittedMail(
            $request->email, $request->message
        ));

        return redirect()->back();
    }
}
