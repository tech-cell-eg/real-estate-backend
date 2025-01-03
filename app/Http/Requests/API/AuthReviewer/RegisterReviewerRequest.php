<?php

namespace App\Http\Requests\API\AuthReviewer;

use App\Rules\UniqueEmailRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterReviewerRequest extends FormRequest
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
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms_accepted' => ['required', 'boolean', 'accepted'],
            'certificate' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx', 'max:2048'],
            'review_fees' => ['required', 'decimal:0,2'],
            'national_id' => ['required', 'string', 'max:255', 'unique:reviewers'],
        ];
    }
}
