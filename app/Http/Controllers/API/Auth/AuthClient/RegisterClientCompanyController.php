<?php

namespace App\Http\Controllers\API\Auth\AuthClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthClient\RegisterClientCompanyRequest;
use App\Models\Client;
use App\Traits\ApiResponse;
use App\Traits\FileControl;

class RegisterClientCompanyController extends Controller
{
    use ApiResponse, FileControl;

    /**
     * @throws \Exception
     */
    public function __invoke(RegisterClientCompanyRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'company';
        $data['delegation'] = $this->uploadFiles($data['delegation'], 'Delegations')[0];
        $client = Client::create($data);
        $token = $client->createToken('API Token')->plainTextToken;
        return $this->success(200, 'Client Company created successfully', [
            'token' => $token,
            'client' => $client
        ]);
    }
}
