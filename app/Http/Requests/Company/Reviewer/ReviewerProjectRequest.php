<?php

namespace App\Http\Requests\Company\Reviewer;

use Illuminate\Foundation\Http\FormRequest;

class ReviewerProjectRequest extends FormRequest
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
            "reviewer_id"=>['required','exists:reviewers,id']
        ];
    }
}
