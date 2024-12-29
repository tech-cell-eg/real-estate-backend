<?php

namespace App\Http\Controllers\API\Auth\AuthClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthClient\RegisterClientCompanyRequest;
use App\Http\Requests\API\AuthClient\RegisterClientIndividualRequest;
use App\Models\Client;
use App\Traits\ApiResponse;
use App\Traits\FileControl;

class RegisterController extends Controller
{
    use ApiResponse, FileControl;

    public function registerClientIndividual(RegisterClientIndividualRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'individual';
        $client = Client::create($data);
        $token = $client->createToken('API Token')->plainTextToken;
        return $this->success(200, 'Client Individual created successfully', [
            'token' => $token,
            'client' => $client
        ]);
    }

    /**
     * @throws \Exception
     */
    public function registerClientCompany(RegisterClientCompanyRequest $request)
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
