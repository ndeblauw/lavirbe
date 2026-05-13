<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('question')->get();

        return view('faqs.index', [
            'faqs' => $faqs,
        ]);
    }
}
