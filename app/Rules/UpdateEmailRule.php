<?php

namespace App\Rules;

use App\Traits\AuthUserTrait;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateEmailRule implements ValidationRule
{
    use AuthUserTrait;

    /**
     * Run the validation rule.
     *
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = $this->authUser();
        $models = ['App\Models\Client', 'App\Models\Company', 'App\Models\Inspector'];
        foreach ($models as $model) {
            if ($model::where('email', $value)->exists() && $user->email !== $value) {
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