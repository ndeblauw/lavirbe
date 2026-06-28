<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory;

    protected $guarded = [];

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

    protected static function booted(): void
    {
        static::creating(function (Category $category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->title);
            }

            $category->slug = $category->generateUniqueSlug($category->slug);
        });
    }

    public function generateUniqueSlug(string $slug): string
    {
        $original = $slug;
        $i = 1;

        while (Category::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $original.'-'.$i++;
        }

        return $slug;
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
