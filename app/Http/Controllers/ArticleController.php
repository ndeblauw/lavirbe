<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();

        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }

    public function like(Article $article)
    {
        $article->likes()->attach(auth()->user()->id);

        return redirect()->back();
    }

    public function unlike(Article $article)
    {
        $article->likes()->detach(auth()->user()->id);

        return redirect()->back();
    }
}
