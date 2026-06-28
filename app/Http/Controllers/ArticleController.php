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
}
