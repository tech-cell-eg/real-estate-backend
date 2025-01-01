<?php

namespace App\Http\Controllers\API\Auth\ForgetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginForgetReset\ForgetPasswordRequest;
use App\Jobs\ForgetPasswordJob;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;

class ForgetPasswordController extends Controller
{
    use ApiResponse;

    public function __invoke(ForgetPasswordRequest $request)
    {
        $data = $request->validated();
        $models = ['App\Models\Company', 'App\Models\Client', 'App\Models\Inspector'];
        $user = null;
        $userType = null;
        foreach ($models as $model) {
            if ($result = $model::where('email', $data['email'])->first()) {
                $userType = strtolower(class_basename($model));
                $user = $result;
                break;
            }
        }
        $otp = rand(10000, 99999);
        ForgetPasswordJob::dispatch($user, $otp);
        DB::table('password_reset_tokens')->updateOrInsert(['email' => $data['email']], [
            'token' => $otp,
            'created_at' => now(),
        ]);
        return $this->success(200, "User type: {$userType}, OTP sent to your email successfully and valid for 30 minutes.", [
            'otp' => $otp,
        ]);
    }
}
