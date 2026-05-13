<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        // Data laden
        $categories = Category::all();

        // Data doorgeven aan view
        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:10'],
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/admin/categories');
    }

    public function edit($category)
    {
        $category = Category::findOrFail($category);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $category)
    {
        $category = Category::findOrFail($category);

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:10'],
            'picture' => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png'],
        ]);

        $link_to_file = null;
        if ($request->hasFile('picture')) {
            $link_to_file = Storage::disk('public')->put('categories', $request->picture);
        }

        $category->update([
            'name' => $request->name,
            'picture_path' => $link_to_file,
        ]);

        return redirect('/admin/categories');
    }

    public function destroy($category)
    {
        $category = Category::findOrFail($category);

        $category->delete();

        return redirect('/admin/categories');
    }
}
