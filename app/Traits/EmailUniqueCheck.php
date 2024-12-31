<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait EmailUniqueCheck
{
    const Tables = ['clients', 'companies', 'inspectors'];

    public function emailUniqueCheck($email): void
    {
        $rules = [];
        foreach (static::Tables as $table) {
            $rules[] = 'unique:' . $table . ',email';
        }
        $validator = Validator::make(['email' => $email], ['email' => $rules]);
        if ($validator->fails()) {
            throw ValidationException::withMessages([
                'email' => 'The email has already been taken...'
            ]);
        }
    }
}
