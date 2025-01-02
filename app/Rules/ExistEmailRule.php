<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExistEmailRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
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
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not registered.';
    }
}
