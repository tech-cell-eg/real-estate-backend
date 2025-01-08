<?php

namespace App\Traits;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;


trait AuthUserTrait
{
    use ApiResponse;

    public Authenticatable|null $user;

    public function authUser()
    {
        foreach (config('auth.guards') as $guard => $value) {
            if (auth($guard)->check()) {
                return $this->user = auth($guard)->user();
            }
        }
        return $this->failed(401, 'Unauthenticated');
    }
}