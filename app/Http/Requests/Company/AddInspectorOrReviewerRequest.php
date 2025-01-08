<?php

namespace App\Http\Requests\Company;

use App\Rules\UniqueEmailRule;
use Illuminate\Foundation\Http\FormRequest;

class AddInspectorOrReviewerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', new UniqueEmailRule],
            'phone' => ['required', 'string', 'max:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'data' => ['nullable', 'string'],
        ];
    }
}
