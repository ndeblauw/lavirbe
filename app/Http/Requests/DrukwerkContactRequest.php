<?php

namespace App\Http\Requests;

use App\Http\Controllers\DrukwerkContactController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DrukwerkContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'subject' => ['required', 'string', Rule::in(DrukwerkContactController::PRODUCTS)],
            'quantity' => ['required', 'integer', 'min:1', 'max:50000'],
            'message' => ['nullable', 'string', 'max:5000'],
        ];
    }
}
