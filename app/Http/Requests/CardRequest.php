<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'name_on_card' => ['required', 'string', 'max:255'],
            'card_number' => ['required', 'string','regex:/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/'],
            'expiration_date' => ['required', 'string', 'regex:/^\d{2}\/\d{2}$/'],
            'CVC' => ['required', 'string', 'regex:/^\d{3}$/']
        ];
    }
}
