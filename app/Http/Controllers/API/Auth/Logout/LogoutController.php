<?php

namespace App\Http\Controllers\API\Auth\Logout;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\AuthUserTrait;

class LogoutController extends Controller
{
    use ApiResponse, AuthUserTrait;

    public function __invoke()
    {
        $user = $this->authUser();
        $user->tokens()->delete();
        return $this->success(200, 'User logged out successfully.');
    }
}