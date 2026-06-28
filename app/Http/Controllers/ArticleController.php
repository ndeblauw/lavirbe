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
            ->with('media', 'tags', 'category')
            ->paginate(12)
            ->withQueryString();

        return view('articles.index', [
            'articles' => $articles,
            'noindex' => $search !== '',
        ]);
    }

    public function show(Article $article)
    {
        $imageMedia = $article->media->first();
        $imageUrl = $imageMedia?->getUrl();
        $publishedAt = $article->published_at?->toIso8601String();
        $modifiedAt = $article->updated_at?->toIso8601String();

        return view('articles.show', [
            'article' => $article,
            'seo' => [
                'title' => $article->title,
                'description' => $article->metaDescription(),
                'type' => 'article',
                'image' => $imageUrl,
                'imageAlt' => $article->title,
                'author' => $article->author?->name,
                'publishedAt' => $publishedAt,
                'modifiedAt' => $modifiedAt,
                'readingTime' => $article->readingTime(),
                'keywords' => $article->tags->pluck('title')->toArray(),
                'articleSection' => $article->category?->title,
                'breadcrumbs' => [
                    ['label' => 'Home', 'url' => route('welcome')],
                    ['label' => 'Kennisbank', 'url' => route('articles.index')],
                    ['label' => $article->title],
                ],
            ],
        ]);
    }
}
