<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = collect();

        $urls->push(['url' => route('welcome'), 'priority' => '1.0', 'changefreq' => 'weekly']);
        $urls->push(['url' => route('offers.index'), 'priority' => '0.8', 'changefreq' => 'monthly']);
        $urls->push(['url' => route('formations.index'), 'priority' => '0.8', 'changefreq' => 'monthly']);
        $urls->push(['url' => route('articles.index'), 'priority' => '0.9', 'changefreq' => 'daily']);
        $urls->push(['url' => route('contact.create'), 'priority' => '0.5', 'changefreq' => 'monthly']);

        Article::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->chunk(200, function ($articles) use ($urls) {
                foreach ($articles as $article) {
                    $urls->push([
                        'url' => route('articles.show', $article),
                        'priority' => '0.7',
                        'changefreq' => 'monthly',
                        'lastmod' => $article->updated_at?->toIso8601String(),
                    ]);
                }
            });

        Category::chunk(200, function ($categories) use ($urls) {
            foreach ($categories as $category) {
                $urls->push([
                    'url' => route('categories.show', $category),
                    'priority' => '0.6',
                    'changefreq' => 'weekly',
                ]);
            }
        });

        Tag::chunk(200, function ($tags) use ($urls) {
            foreach ($tags as $tag) {
                $urls->push([
                    'url' => route('tags.show', $tag),
                    'priority' => '0.5',
                    'changefreq' => 'weekly',
                ]);
            }
        });

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }
}
