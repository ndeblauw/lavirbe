<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Package;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::query()->visible()->get();

        return view('formations.index', compact('formations'));
    }
}
