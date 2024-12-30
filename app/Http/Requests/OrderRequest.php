<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'property_id' => ['required', 'exists:properties,id'],
            'company_id' => ['required', 'exists:companies,id'],
            'inspector_id' => ['required', 'exists:inspectors,id'],
            'status' => ['required', 'string', 'in:accepted,rejected,pending'],
            'companyRate' => ['nullable', 'integer', 'min:1', 'max:5'],
            'inspectorsRate' => ['nullable', 'integer', 'min:1', 'max:5'],
        ];
    }
}
