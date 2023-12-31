<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordForgotRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guest();
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email:dns'],
        ];
    }
}
