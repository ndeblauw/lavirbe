<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

it('renders the articles index for an admin', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $article = Article::factory()->create();
    $article->addMediaFromString('fake image content')
        ->usingFileName('image.png')
        ->toMediaCollection('image');

    $this->actingAs($admin)
        ->get(route('admin.articles.index'))
        ->assertOk();
});

it('stores an article with an uploaded single image', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $category = Category::factory()->create();
    $serverId = Crypt::encryptString(Storage::disk('local')->path('filepond/uploaded-image.png'));
    Storage::disk('local')->put('filepond/uploaded-image.png', 'fake image content');

    $this->actingAs($admin)
        ->post(route('admin.articles.store'), [
            'title' => 'New article',
            'content' => 'Body text',
            'category_id' => $category->id,
            'image' => $serverId,
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('articles', ['title' => 'New article']);

    $article = Article::where('title', 'New article')->first();

    expect($article->getFirstMedia('image'))->not->toBeNull();
});

it('renders the article create and edit pages for an admin', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $article = Article::factory()->create();
    $article->addMediaFromString('fake image content')
        ->usingFileName('image.png')
        ->toMediaCollection('image');

    $this->actingAs($admin)
        ->get(route('admin.articles.create'))
        ->assertOk();

    $this->actingAs($admin)
        ->get(route('admin.articles.edit', $article))
        ->assertOk();
});

it('keeps an existing image when an article is updated without a new upload', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $article = Article::factory()->create();
    $media = $article->addMediaFromString('fake image content')
        ->usingFileName('image.png')
        ->toMediaCollection('image');

    $this->actingAs($admin)
        ->patch(route('admin.articles.update', $article), [
            'title' => 'Updated title',
            'image' => 'existing_file_'.$media->id,
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

    expect($article->refresh()->title)->toBe('Updated title')
        ->and($article->getFirstMedia('image'))->not->toBeNull();
});
