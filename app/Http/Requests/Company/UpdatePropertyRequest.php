<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'street' => 'sometimes|required|string',
            'region' => 'sometimes|required|string',
            'governorate' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'description' => 'sometimes|required|string',
            'type' => 'sometimes|required|string',
            'area' => 'sometimes|required|numeric',
            'images' => 'sometimes|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}