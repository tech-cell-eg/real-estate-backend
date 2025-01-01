<?php

namespace App\Http\Controllers\API\Auth\Logout;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;

class LogoutController extends Controller
{
    use ApiResponse;

    public function __invoke()
    {
        auth()->user()->tokens()->delete();
        return $this->success(200, 'User logged out successfully.');
    }
}