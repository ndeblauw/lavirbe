<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\User;

test('welcome page renders seo meta tags', function () {
    $response = $this->get(route('welcome'));

    $response->assertStatus(200)
        ->assertSee('<meta name="description"', false)
        ->assertSee('<meta name="robots"', false)
        ->assertSee('<link rel="canonical"', false)
        ->assertSee('og:title', false)
        ->assertSee('og:type', false)
        ->assertSee('twitter:card', false)
        ->assertSee('<meta name="theme-color"', false);
});

test('welcome page renders json-ld structured data', function () {
    $response = $this->get(route('welcome'));

    $response->assertStatus(200)
        ->assertSee('application/ld+json', false)
        ->assertSee('"@type":"Organization"', false)
        ->assertSee('"@type":"WebSite"', false)
        ->assertSee('"@type":"WebPage"', false)
        ->assertSee('SearchAction', false);
});

test('welcome page renders favicon links', function () {
    $response = $this->get(route('welcome'));

    $response->assertStatus(200)
        ->assertSee('favicon-32.png', false)
        ->assertSee('favicon-192.png', false)
        ->assertSee('apple-touch-icon-180.png', false)
        ->assertSee('msapplication-TileImage', false);
});

test('welcome page renders skip link and main has id content', function () {
    $response = $this->get(route('welcome'));

    $response->assertStatus(200)
        ->assertSee('Ga naar de inhoud', false)
        ->assertSee('id="content"', false);
});

test('welcome page renders speculationrules script', function () {
    $response = $this->get(route('welcome'));

    $response->assertStatus(200)
        ->assertSee('speculationrules', false);
});

test('article show page renders article seo metadata', function () {
    $author = User::factory()->create(['name' => 'Ailan']);
    $category = Category::factory()->create(['title' => 'Bestuur']);
    $article = Article::factory()->create([
        'title' => 'Transparantie bij vzw\'s',
        'content' => 'Transparantie is voor vzw\'s geen luxe, maar een noodzaak.',
        'meta_description' => 'Transparantie is voor vzw\'s geen luxe, maar een noodzaak. Maar hoe bouw je als vzw écht aan vertrouwen?',
        'published_at' => now(),
        'author_id' => $author->id,
        'category_id' => $category->id,
    ]);

    $response = $this->get(route('articles.show', $article));

    $response->assertStatus(200)
        ->assertSee('og:type" content="article', false)
        ->assertSee('article:published_time', false)
        ->assertSee('twitter:label1', false)
        ->assertSee('Ailan', false)
        ->assertSee('Geschatte leestijd', false)
        ->assertSee('"@type":"Article"', false)
        ->assertSee('"@type":"BreadcrumbList"', false)
        ->assertSee('"@type":"Person"', false);
});

test('article show page uses curated meta description when present', function () {
    $article = Article::factory()->create([
        'title' => 'Test Article',
        'content' => 'Long content that should NOT be used as description because we have a curated one.',
        'meta_description' => 'Curated short description.',
        'published_at' => now(),
    ]);

    $response = $this->get(route('articles.show', $article));

    $response->assertStatus(200)
        ->assertSee('<meta name="description" content="Curated short description.">', false);
});

test('article show page falls back to content excerpt when no meta description', function () {
    $article = Article::factory()->create([
        'title' => 'Test Article',
        'content' => 'This is the body content that becomes the description fallback when no curated meta description is set.',
        'meta_description' => null,
        'published_at' => now(),
    ]);

    $response = $this->get(route('articles.show', $article));

    $response->assertStatus(200)
        ->assertSee('This is the body content that becomes', false);
});

test('articles index sets noindex when searching', function () {
    Article::factory()->create(['title' => 'Laravel Testing', 'published_at' => now()]);

    $response = $this->get(route('articles.index', ['search' => 'Laravel']));

    $response->assertStatus(200)
        ->assertSee('noindex, follow', false);
});

test('articles index without search is indexable', function () {
    Article::factory()->create(['published_at' => now()]);

    $response = $this->get(route('articles.index'));

    $response->assertStatus(200)
        ->assertSee('index, follow, max-image-preview:large', false);
});

test('static pages render seo description from config', function () {
    $response = $this->get(route('offers.index'));

    $response->assertStatus(200)
        ->assertSee('governance, administratie, personeelszaken', false);
});

test('article show page wraps content in semantic article element', function () {
    $article = Article::factory()->create(['published_at' => now()]);

    $response = $this->get(route('articles.show', $article));

    $response->assertStatus(200)
        ->assertSee('<article', false);
});
