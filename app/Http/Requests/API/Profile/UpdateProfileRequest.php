<?php

namespace App\Http\Requests\API\Profile;

use App\Rules\UpdateEmailRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', new UpdateEmailRule],
            'phone' => ['nullable', 'string', 'max:11'],
            'city_id' => ['nullable', 'integer', 'exists:cities,id'],
        ];
    }
}