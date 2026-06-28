<?php

namespace App\Http\Controllers;

use App\Models\Package;

class OfferController extends Controller
{
    public function index()
    {
        $packages = Package::query()->visible()->get();

        return view('offers.index', [
            'packages' => $packages,
            'seo' => config('seo.pages.offers'),
        ]);
    }
}
