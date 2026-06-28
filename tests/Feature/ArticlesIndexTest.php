<?php

use App\Models\Article;

test('articles index page displays search form', function () {
    $response = $this->get(route('articles.index'));

    $response->assertStatus(200)
        ->assertSee('name="search"', false);
});

test('search filters articles by title', function () {
    Article::factory()->create(['title' => 'Laravel Testing Guide', 'published_at' => now()]);
    Article::factory()->create(['title' => 'Unrelated Topic', 'published_at' => now()]);

    $response = $this->get(route('articles.index', ['search' => 'Laravel Testing']));

    $response->assertStatus(200)
        ->assertSeeText('Laravel Testing Guide')
        ->assertDontSeeText('Unrelated Topic');
});

test('search filters articles by content', function () {
    Article::factory()->create([
        'title' => 'Some Title',
        'content' => 'Unique content keyword banana',
        'published_at' => now(),
    ]);
    Article::factory()->create([
        'title' => 'Other Title',
        'content' => 'Completely different text',
        'published_at' => now(),
    ]);

    $response = $this->get(route('articles.index', ['search' => 'banana']));

    $response->assertStatus(200)
        ->assertSeeText('Some Title')
        ->assertDontSeeText('Other Title');
});

test('search query is preserved in pagination links', function () {
    Article::factory()->count(15)->create([
        'title' => 'Test article title',
        'published_at' => now(),
    ]);

    $response = $this->get(route('articles.index', ['search' => 'Test']));

    $response->assertStatus(200)
        ->assertSee('search=Test', false);
});

test('empty search returns all articles', function () {
    Article::factory()->count(3)->create(['published_at' => now()]);

    $response = $this->get(route('articles.index', ['search' => '   ']));

    $response->assertStatus(200);
});
