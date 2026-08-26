<?php

use App\Models\Package;
use App\Models\Tag;
use App\Models\User;

it('stores a package with tags', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $tag = Tag::factory()->create();

    $this->actingAs($admin)
        ->post(route('admin.packages.store'), [
            'title' => 'Tagged package',
            'body' => 'Body text',
            'hidden' => false,
            'tags' => [$tag->id],
        ])
        ->assertRedirect();

    $package = Package::where('title', 'Tagged package')->first();

    expect($package->tags->pluck('id')->all())->toBe([$tag->id]);
});

it('syncs tags when a package is updated', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $package = Package::factory()->create(['title' => 'Existing package']);
    $oldTag = Tag::factory()->create();
    $newTag = Tag::factory()->create();
    $package->tags()->attach($oldTag);

    $this->actingAs($admin)
        ->patch(route('admin.packages.update', $package), [
            'title' => 'Updated package',
            'hidden' => false,
            'tags' => [$newTag->id],
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

    expect($package->refresh()->tags->pluck('id')->all())->toBe([$newTag->id]);
});
