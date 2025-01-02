<?php

namespace App\Http\Requests\API\LoginForgetReset;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255', function ($attribute, $value, $fail) {
                $models = ['App\Models\Client', 'App\Models\Company', 'App\Models\Inspector'];
                $exists = false;
                foreach ($models as $model) {
                    if ($model::where('email', $value)->exists()) {
                        $exists = true;
                        break;
                    }
                }
                if (!$exists) {
                    $fail('This email is not registered.');
                }
            }],
            'password' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
