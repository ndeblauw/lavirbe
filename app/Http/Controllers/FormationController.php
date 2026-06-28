<?php

namespace App\Http\Controllers;

use App\Models\Formation;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::query()->visible()->get();

        return view('formations.index', [
            'formations' => $formations,
            'seo' => config('seo.pages.formations'),
        ]);
    }
}
