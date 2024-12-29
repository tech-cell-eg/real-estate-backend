<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'street' => 'required|string',
            'region' => 'required|string',
            'governorate' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'type' => 'required|string',
            'area' => 'required|numeric',
            'images' => 'required|array', // Expecting an array of images
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate each image
        ];
    }
}
