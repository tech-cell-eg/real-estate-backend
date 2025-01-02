<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            "file" => ["required", "file", "mimes:pdf"],
            "price" => ["required","numeric"],
            "company_id" => ["required", "exists:companies,id"],
            "inspector_id" => ["required","exists:inspectors,id"],
            "property_id" => ["required","exists:properties,id"],
            "status" => ["required","string","in:pending,accepted,rejected"]
        ];
    }
}
