<?php

namespace App\Http\Controllers\API\Auth\RegisterClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthClient\RegisterClientCompanyRequest;
use App\Models\Client;
use App\Traits\ApiResponse;
use App\Traits\AuthUserTrait;
use App\Traits\FileControl;

class RegisterController extends Controller
{
    use ApiResponse, FileControl, AuthUserTrait;

    /**
     * @throws \Exception
     */
    public function __invoke(RegisterClientCompanyRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'company';
        $data['delegation'] = $this->uploadFiles($data['delegation'], 'Delegations')[0];
        $client = Client::create($data);
        $token = $client->createToken("client API Token")->plainTextToken;
        return $this->success(200, 'Client Company created successfully', [
            'token' => $token,
            'client company' => $client
        ]);
    }
}
