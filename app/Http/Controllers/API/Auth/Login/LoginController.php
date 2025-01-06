<?php

namespace App\Http\Controllers\API\Auth\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginForgetReset\LoginRequest;
use App\Traits\ApiResponse;
use App\Traits\EmailExistTrait;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiResponse, EmailExistTrait;

    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated();
        $info = $this->userExist($credentials['email']);
        if (!$info['user'] || !Hash::check($credentials['password'], $info['user']->password)) {
            return $this->failed(422, "Invalid credentials");
        }
        $token = $info['user']->createToken("{$info['userType']} API Token")->plainTextToken;
        return $this->success(200, "User type: {$info['userType']} logged in successfully", [
            'token' => $token,
            $info['userType'] => $info['user']
        ]);
    }
}
