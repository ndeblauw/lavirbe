<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('formations', 'slug')->ignore($this->formation)],
            'body' => ['nullable', 'string'],
            'hidden' => ['nullable', 'boolean'],
            'banner' => ['nullable', 'string'],
        ];
    }
}
