<?php

namespace App\Models;

use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Customer extends Model implements HasMedia
{
    /** @use HasFactory<CustomerFactory> */
    use HasFactory, InteractsWithMedia;

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->singleFile();
    }
}
