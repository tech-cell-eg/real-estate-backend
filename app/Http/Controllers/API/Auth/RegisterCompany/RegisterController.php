<?php

namespace App\Http\Controllers\API\Auth\RegisterCompany;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthCompany\RegisterCompanyRequest;
use App\Models\Company;
use App\Traits\ApiResponse;
use App\Traits\EmailUniqueCheck;
use App\Traits\FileControl;

class RegisterController extends Controller
{
    use ApiResponse, FileControl, EmailUniqueCheck;

    /**
     * @throws \Exception
     */
    public function __invoke(RegisterCompanyRequest $request)
    {
        $data = $request->validated();
        $data['delegation'] = $this->uploadFiles($data['delegation'], 'Delegations')[0];
        $this->emailUniqueCheck($data['email']);
        $company = Company::create($data);
        $token = $company->createToken("company API Token")->plainTextToken;
        return $this->success(200, 'Company created successfully', [
            'token' => $token,
            'company' => $company
        ]);
    }
}
