<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')->orderBy('title')->get();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    public function show(Category $category)
    {
        $articles = $category->articles()
            ->with('media', 'tags', 'category')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('categories.show', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }
}
