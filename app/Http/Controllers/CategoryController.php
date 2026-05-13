<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    public function show(Category $category)
    {
        // Mag overgeslagen worden, want ik type-hint het model in de functie
        // $category = \App\Models\Category::findOrFail($category);

        return view('categories.show', [
            'category' => $category,
        ]);
    }
}
