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
}
