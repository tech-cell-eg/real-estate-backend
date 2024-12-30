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
            "address" => ["sometimes","required","string"],
            "city" => ["sometimes","required","string"],
            "region" => ["sometimes","required","string"],
            "images" => ["sometimes","required","array"],
            "description" => ["sometimes","required"],
            "area" => ["sometimes","required", "numeric"],
            "longitude" => ["sometimes","required", "numeric"],
            "latitude" => ["sometimes","required", "numeric"],
            "type" => ["sometimes","required","in:سكني,تجاري,صناعي"],
            "price" => ["sometimes","required","numeric"],
            "images" => ["sometimes","required","array"], // Expecting an array of images
            "images.*" => ["image","mimes:jpeg,png,jpg,gif","max:2048"] // Validate each image

        ];
    }
}
