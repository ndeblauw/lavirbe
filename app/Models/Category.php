<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function picture_image()
    {
        if ($this->picture_path) {
            return asset('storage/'.$this->picture_path);
        } else {
            return asset('img/dummy-image-square.jpg');
        }
    }
}
