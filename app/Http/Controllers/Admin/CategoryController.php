<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        // Data laden
        $categories = Category::all();

        // Data doorgeven aan view
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    function create()
    {
        return view('admin.categories.create');
    }

    function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/admin/categories');
    }
}
