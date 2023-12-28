<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ProfilePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'current_password'],
            'new_password' => ['required', 'string', 'confirmed', Password::min(5)->letters()->mixedCase()]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        session()->flash('activeTab', 2);
        parent::failedValidation($validator);
    }
}
