<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            "address" => ["required"],
            "city" => ["required"],
            "region" => ["required"],
            "images" => ["required", 'array'],
            "description" => ["required"],
            "area" => ["required", "numeric"],
            "longitude" => ["required", "numeric"],
            "latitude" => ["required", "numeric"],
            "type" => ['required','in:سكني,تجاري,صناعي'],
            "status" => ['in:pending,accepted,rejected']
        ];
    }
}
