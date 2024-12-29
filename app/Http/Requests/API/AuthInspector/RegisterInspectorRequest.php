<?php

namespace App\Http\Requests\API\AuthInspector;

use Illuminate\Foundation\Http\FormRequest;

class RegisterInspectorRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:inspectors',
            'phone' => 'required|string|max:11',
            'inspection_fees' => 'required|decimal:0,2',
            'password' => 'required|string|min:8|confirmed',
            'city_id' => 'required|integer|exists:cities,id',
            'area_id_1' => 'required|integer|exists:areas,id,city_id,' . $this->city_id,
            'area_id_2' => 'nullable|integer|exists:areas,id,city_id,' . $this->city_id,
            'area_id_3' => 'nullable|integer|exists:areas,id,city_id,' . $this->city_id,
            'national_id' => 'required|string|max:255|unique:inspectors',
            'delegation' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx|max:2048',
            'terms_accepted' => 'required|boolean|accepted',
        ];
    }
}
