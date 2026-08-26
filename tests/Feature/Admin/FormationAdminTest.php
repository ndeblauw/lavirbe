<?php

use App\Models\Formation;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

it('stores a formation with an uploaded single banner', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $serverId = Crypt::encryptString(Storage::disk('local')->path('filepond/uploaded-banner.png'));
    Storage::disk('local')->put('filepond/uploaded-banner.png', 'fake image content');

    $this->actingAs($admin)
        ->post(route('admin.formations.store'), [
            'title' => 'New formation',
            'body' => 'Body text',
            'hidden' => false,
            'banner' => $serverId,
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('formations', ['title' => 'New formation']);

    $formation = Formation::where('title', 'New formation')->first();

    expect($formation->getFirstMedia('banner'))->not->toBeNull();
});

it('keeps an existing banner when a formation is updated without a new upload', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $formation = Formation::create(['title' => 'Existing formation', 'body' => 'Body']);
    $media = $formation->addMediaFromString('fake image content')
        ->usingFileName('banner.png')
        ->toMediaCollection('banner');

    $this->actingAs($admin)
        ->patch(route('admin.formations.update', $formation), [
            'title' => 'Updated formation',
            'body' => 'Body',
            'banner' => 'existing_file_'.$media->id,
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

    expect($formation->refresh()->title)->toBe('Updated formation')
        ->and($formation->getFirstMedia('banner'))->not->toBeNull();
});
