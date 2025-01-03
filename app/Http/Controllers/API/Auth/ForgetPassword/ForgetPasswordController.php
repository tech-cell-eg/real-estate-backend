<?php

namespace App\Http\Controllers\API\Auth\ForgetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginForgetReset\ForgetPasswordRequest;
use App\Jobs\ForgetPasswordJob;
use App\Traits\ApiResponse;
use App\Traits\EmailExistTrait;
use Illuminate\Support\Facades\DB;

class ForgetPasswordController extends Controller
{
    use ApiResponse, EmailExistTrait;

    public function __invoke(ForgetPasswordRequest $request)
    {
        $data = $request->validated();
        $info = $this->userExist($data['email']);
        $otp = rand(10000, 99999);
        ForgetPasswordJob::dispatch($info['user'], $otp);
        DB::table('password_reset_tokens')->updateOrInsert(['email' => $data['email']], [
            'token' => $otp,
            'created_at' => now(),
        ]);
        return $this->success(200, "User type: {$info['userType']}, OTP sent to your email successfully and valid for 30 minutes.", [
            'otp' => $otp,
        ]);
    }
}
