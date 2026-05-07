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
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:10'],
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/admin/categories');
    }

    function edit($category)
    {
        $category = \App\Models\Category::findOrFail($category);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    function update(Request $request, $category)
    {
        $category = \App\Models\Category::findOrFail($category);

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:10'],
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect('/admin/categories');
    }

    function destroy($category)
    {
        $category = \App\Models\Category::findOrFail($category);

        $category->delete();

        return redirect('/admin/categories');
    }
}
