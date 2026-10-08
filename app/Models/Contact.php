<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public const TYPE_LAVIR = 'lavir';

    public const TYPE_DRUKWERK = 'drukwerk';

    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'subject',
        'quantity',
        'message',
        'is_spam',
        'spam_reason',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'is_spam' => 'boolean',
        ];
    }

    /**
     * @param  Builder<Contact>  $query
     */
    public function scopeNotSpam(Builder $query): void
    {
        $query->where('is_spam', false);
    }

    /**
     * @param  Builder<Contact>  $query
     */
    public function scopeSpam(Builder $query): void
    {
        $query->where('is_spam', true);
    }
}
