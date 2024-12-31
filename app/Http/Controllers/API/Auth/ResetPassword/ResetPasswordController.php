<?php

namespace App\Http\Controllers\API\Auth\ResetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginForgetReset\ResetPasswordRequest;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    use ApiResponse;

    public function __invoke(ResetPasswordRequest $request)
    {
        // This is for testing purposes only. Enter 12345 as OTP to bypass any OTP check.
        $data = $request->validated();
        $reset = DB::table('password_reset_tokens')->where('token', $data['otp'])->first();
        if ($request->otp == 12345) {
            $reset = DB::table('password_reset_tokens')->latest()->first();
        }
        if (!$reset || $reset->created_at < now()->subMinutes(30)) {
            return $this->failed(422, 'User not found.');
        }
        $models = ['App\Models\Company', 'App\Models\Client', 'App\Models\Inspector'];
        $user = null;
        foreach ($models as $model) {
            if ($result = $model::where('email', $reset->email)->first()) {
                $user = $result;
                break;
            }
        }
        $user->update(['email' => $reset->email], [
            'password' => $request->password
        ]);
        if ($request->otp == 12345) {
            DB::table('password_reset_tokens')->latest()->delete();
        } else {
            DB::table('password_reset_tokens')->where('token', $data['otp'])->delete();
        }
        return $this->success(200, 'Password reset successfully.');
    }
}
