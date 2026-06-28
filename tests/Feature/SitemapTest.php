<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

test('sitemap xml endpoint returns 200 and xml content type', function () {
    $response = $this->get(route('sitemap'));

    $response->assertStatus(200)
        ->assertHeader('Content-Type', 'application/xml');
});

test('sitemap contains static page urls', function () {
    $response = $this->get(route('sitemap'));

    $response->assertStatus(200)
        ->assertSee(route('welcome'), false)
        ->assertSee(route('offers.index'), false)
        ->assertSee(route('formations.index'), false)
        ->assertSee(route('articles.index'), false)
        ->assertSee(route('contact.create'), false);
});

test('sitemap contains published article urls', function () {
    $article = Article::factory()->create(['published_at' => now()]);
    $unpublished = Article::factory()->create(['published_at' => null]);

    $response = $this->get(route('sitemap'));

    $response->assertStatus(200)
        ->assertSee(route('articles.show', $article), false)
        ->assertDontSee(route('articles.show', $unpublished), false);
});

test('sitemap contains category and tag urls', function () {
    $category = Category::factory()->create();
    $tag = Tag::factory()->create();

    $response = $this->get(route('sitemap'));

    $response->assertStatus(200)
        ->assertSee(route('categories.show', $category), false)
        ->assertSee(route('tags.show', $tag), false);
});

test('sitemap has valid xml structure', function () {
    $response = $this->get(route('sitemap'));

    $response->assertStatus(200)
        ->assertSee('<?xml version="1.0" encoding="UTF-8"?>', false)
        ->assertSee('<urlset', false)
        ->assertSee('sitemaps.org/schemas/sitemap/0.9', false);
});
