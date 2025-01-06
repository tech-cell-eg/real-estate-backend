<?php

namespace App\Http\Controllers\API\Auth\RegisterClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthClient\RegisterClientIndividualRequest;
use App\Models\Client;
use App\Traits\ApiResponse;
use App\Traits\AuthUserTrait;
use App\Traits\FileControl;

class RegisterClientIndividualController extends Controller
{
    use ApiResponse, FileControl, AuthUserTrait;

    public function __invoke(RegisterClientIndividualRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'individual';
        $client = Client::create($data);
        $token = $client->createToken("client API Token")->plainTextToken;
        return $this->success(200, 'Client Individual created successfully', [
            'token' => $token,
            'client individual' => $client
        ]);
    }
}
