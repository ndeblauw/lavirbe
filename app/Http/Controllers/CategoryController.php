<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::orderBy('name')->get();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }



    function show(Category $category)
    {
        // Mag overgeslagen worden, want ik type-hint het model in de functie
        //$category = \App\Models\Category::findOrFail($category);

        return view('categories.show', [
            'category' => $category
        ]);
    }
}
