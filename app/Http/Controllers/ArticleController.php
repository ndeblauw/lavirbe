<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }
}
