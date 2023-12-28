<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'avatar' => ['nullable','image'],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'max:255', 'email:dns',
                Rule::unique('users')->ignore(auth()->user()->getAuthIdentifier())
            ],
        ];
    }
}
