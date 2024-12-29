<?php

namespace App\Http\Controllers\API\Auth\AuthInspector;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthInspector\RegisterInspectorRequest;
use App\Models\Inspector;
use App\Traits\ApiResponse;
use App\Traits\FileControl;

class RegisterController extends Controller
{
    use ApiResponse, FileControl;

    public function __invoke(RegisterInspectorRequest $request)
    {
        $data = $request->validated();
        $data['delegation'] = $this->uploadFiles($data['delegation'], 'Delegations')[0];
        $client = Inspector::create($data);
        $token = $client->createToken('API Token')->plainTextToken;
        return $this->success(200, 'Company created successfully', [
            'token' => $token,
            'client' => $client
        ]);
    }
}