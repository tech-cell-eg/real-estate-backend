<?php

namespace App\Http\Requests\API\LoginForgetReset;

use App\Rules\ExistEmailRule;
use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255', new ExistEmailRule],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
