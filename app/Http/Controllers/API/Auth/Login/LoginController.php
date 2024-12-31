<?php

namespace App\Http\Controllers\API\Auth\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginForgetReset\LoginRequest;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiResponse;

    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated();
        $models = ['App\Models\Company', 'App\Models\Client', 'App\Models\Inspector'];
        $user = null;
        $userType = null;
        foreach ($models as $model) {
            if ($result = $model::where('email', $credentials['email'])->first()) {
                $userType = strtolower(class_basename($model));
                $user = $result;
                break;
            }
        }
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return $this->failed(422, "Invalid credentials");
        }
        $token = $user->createToken('API Token')->plainTextToken;
        return $this->success(200, "User type: {$userType} logged in successfully", [
            'token' => $token,
            $userType => $user
        ]);
    }
}
