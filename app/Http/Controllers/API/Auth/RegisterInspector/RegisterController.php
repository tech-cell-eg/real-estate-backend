<?php

namespace App\Http\Controllers\API\Auth\RegisterInspector;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthInspector\RegisterInspectorRequest;
use App\Models\Inspector;
use App\Traits\ApiResponse;
use App\Traits\EmailUniqueCheck;
use App\Traits\FileControl;

class RegisterController extends Controller
{
    use ApiResponse, FileControl, EmailUniqueCheck;

    /**
     * @throws \Exception
     */
    public function __invoke(RegisterInspectorRequest $request)
    {
        $data = $request->validated();
        $data['delegation'] = $this->uploadFiles($data['delegation'], 'Delegations')[0];
        $this->emailUniqueCheck($data['email']);
        $inspector = Inspector::create($data);
        $token = $inspector->createToken("inspector API Token")->plainTextToken;
        return $this->success(200, 'Company created successfully', [
            'token' => $token,
            'inspector' => $inspector
        ]);
    }
}
