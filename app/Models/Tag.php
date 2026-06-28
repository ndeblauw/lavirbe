<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'hidden' => 'boolean',
        ];
    }

    #[Scope]
    public function visible(Builder $query): Builder
    {
        return $query->where('hidden', false);
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function packages()
    {
        return $this->morphedByMany(Package::class, 'taggable');
    }

    public function formations()
    {
        return $this->morphedByMany(Formation::class, 'taggable');
    }

    protected static function booted(): void
    {
        static::creating(function (Tag $tag) {
            if (empty($tag->slug)) {
                $tag->slug = Str::slug($tag->title);
            }

            $tag->slug = $tag->generateUniqueSlug($tag->slug);
        });
    }

    public function generateUniqueSlug(string $slug): string
    {
        $original = $slug;
        $i = 1;

        while (Tag::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $original.'-'.$i++;
        }

        return $slug;
    }
}
