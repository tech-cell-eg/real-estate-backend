<?php

namespace App\Http\Requests\API\LoginForgetReset;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'otp' => ['required', 'integer', 'digits:5'],
            'password' => ['required', 'string', Password::min(8), 'confirmed'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}