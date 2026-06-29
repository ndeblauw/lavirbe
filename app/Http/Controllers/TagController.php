<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')->orderBy('title')->get();
        $tags = Tag::withCount('articles')->orderBy('title')->get();

        return view('tags.index', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function show(Tag $tag)
    {
        $articles = $tag->articles()
            ->with('media', 'tags', 'category')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('tags.show', [
            'tag' => $tag,
            'articles' => $articles,
        ]);
    }
}
