<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model implements HasMedia
{
    /** @use HasFactory<ArticleFactory> */
    use HasFactory, HasSlug, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function metaDescription(): string
    {
        if (! empty($this->meta_description)) {
            return $this->meta_description;
        }

        return Str::limit(strip_tags($this->content), 160);
    }

    public function readingTime(): int
    {
        $wordCount = Str::wordCount(strip_tags($this->content));

        return (int) max(1, ceil($wordCount / config('seo.reading_speed_wpm', 200)));
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
}
