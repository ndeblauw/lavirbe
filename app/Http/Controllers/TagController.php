<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('articles')->orderBy('title')->get();

        return view('tags.index', [
            'tags' => $tags,
        ]);
    }

    public function show(Tag $tag)
    {
        $articles = $tag->articles()->orderBy('published_at', 'desc')->get();

        return view('tags.show', [
            'tag' => $tag,
            'articles' => $articles,
        ]);
    }
}
