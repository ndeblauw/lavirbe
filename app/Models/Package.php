<?php

namespace App\Models;

use Database\Factories\PackageFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    /** @use HasFactory<PackageFactory> */
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

    protected static function booted(): void
    {
        static::creating(function (Package $package) {
            if (empty($package->slug)) {
                $package->slug = Str::slug($package->title);
            }

            $package->slug = $package->generateUniqueSlug($package->slug);
        });
    }

    public function generateUniqueSlug(string $slug): string
    {
        $original = $slug;
        $i = 1;

        while (Package::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $original.'-'.$i++;
        }

        return $slug;
    }
}
