<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory, HasSlug;

    protected $guarded = [];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'category_id', 'id');
    }

    public function packages()
    {
        return $this->hasMany(Package::class, 'category_id', 'id');
    }

    public function formations()
    {
        return $this->hasMany(Formation::class, 'category_id', 'id');
    }

    public function picture_image()
    {
        if ($this->picture_path) {
            return asset('storage/'.$this->picture_path);
        } else {
            return asset('img/dummy-image-square.jpg');
        }
    }
}
