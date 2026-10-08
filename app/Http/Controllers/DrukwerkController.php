<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DrukwerkController extends Controller
{
    public function index(): View
    {
        return view('drukwerk.index');
    }
}
