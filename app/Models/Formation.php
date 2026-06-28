<?php

namespace App\Models;

use Database\Factories\FormationFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Formation extends Model implements HasMedia
{
    /** @use HasFactory<FormationFactory> */
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::creating(function (Formation $formation) {
            if (empty($formation->slug)) {
                $formation->slug = Str::slug($formation->title);
            }

            $formation->slug = $formation->generateUniqueSlug($formation->slug);
        });
    }



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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banner')
            ->singleFile();
    }



    public function generateUniqueSlug(string $slug): string
    {
        $original = $slug;
        $i = 1;

        while (Formation::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $original.'-'.$i++;
        }

        return $slug;
    }
}
