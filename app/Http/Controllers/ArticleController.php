<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $search = trim((string) request()->string('search'));

        $articles = Article::query()
            ->when($search !== '', function ($query) use ($search) {
                $term = '%'.$search.'%';

                $query->where(function ($query) use ($term) {
                    $query->where('title', 'like', $term)
                        ->orWhere('content', 'like', $term);
                });
            })
            ->orderBy('published_at', 'desc')
            ->paginate(12)
            ->withQueryString();

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
