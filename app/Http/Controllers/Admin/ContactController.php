<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Ndeblauw\BlueAdmin\Http\Controllers\AdminController;

class ContactController extends AdminController
{
    public function index()
    {
        $this->policyCheck('viewAny');

        $showSpam = request()->boolean('spam');

        $models = Contact::query()
            ->when($showSpam, fn ($query) => $query->spam(), fn ($query) => $query->notSpam())
            ->latest()
            ->get();

        return view('admin.contacts.index', [
            'models' => $models,
            'config' => $this->config,
            'showSpam' => $showSpam,
        ]);
    }

    public function toggleSpam(Contact $contact)
    {
        $this->policyCheck('update', $contact);

        $contact->update([
            'is_spam' => ! $contact->is_spam,
            'spam_reason' => $contact->is_spam ? null : $contact->spam_reason,
        ]);

        return back();
    }

    public function destroySpam()
    {
        $this->policyCheck('delete');

        Contact::query()->spam()->delete();

        return redirect()->route('admin.contacts.index', ['spam' => 1]);
    }
}
