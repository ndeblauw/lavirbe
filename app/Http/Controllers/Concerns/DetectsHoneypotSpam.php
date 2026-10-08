<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;
use Spatie\Honeypot\Exceptions\SpamException;
use Spatie\Honeypot\SpamProtection;

trait DetectsHoneypotSpam
{
    protected function isSpam(Request $request, SpamProtection $spamProtection): bool
    {
        try {
            $spamProtection->check($request->all());

            return false;
        } catch (SpamException) {
            return true;
        }
    }
}
