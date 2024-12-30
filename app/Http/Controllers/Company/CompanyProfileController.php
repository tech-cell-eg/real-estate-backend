<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\ResetPasswordRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;

class CompanyProfileController extends Controller
{
    use ApiResponse;
    public function update(UpdateCompanyRequest $request,Company $company)
    {
        
        // $company = $request->user(); // Get the authenticated company/user
        $data = $request->validated();
        // Update the company data
        $company->update($data);
    
        return $this->success(200, 'Company profile updated successfully', [
            'Company' => $company
        ]);
    }


    public function resetPassword(ResetPasswordRequest $request) {
        $request->validated();
        
        $company = Company::where('id',1)->first();
        // Check current password
        if (!Hash::check($request->current_password, $company->password)) {
            return $this->failed(400, 'Current password is incorrect.');
        }
    
        // Update new password
        $company->password = Hash::make($request->new_password);
        $company->save();
    
        return $this->success(200, 'Password reset successfully.');
    }
}
