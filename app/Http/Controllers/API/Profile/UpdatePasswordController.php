<?php

namespace App\Http\Controllers\API\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Profile\UpdatePasswordRequest;
use App\Traits\ApiResponse;
use App\Traits\AuthUserTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class UpdatePasswordController extends Controller
{
    use ApiResponse, AuthUserTrait;

    public function __invoke(UpdatePasswordRequest $request)
    {
        $user = $this->authUser();
        $data = $request->validated();
        if ($user instanceof Authenticatable) {
            $user->update($data);
        }
        return $this->success(200, 'User Password updated successfully', $user);
    }
}