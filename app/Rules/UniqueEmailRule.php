<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueEmailRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $models = ['App\Models\Client', 'App\Models\Company', 'App\Models\Inspector', 'App\Models\Reviewer'];
        foreach ($models as $model) {
            if ($model::where('email', $value)->exists()) {
                $fail('The email address is already in use.');
                return;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is already taken.';
    }
}