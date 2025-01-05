<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\ResetPasswordRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Resources\company\WalletResource;
use App\Models\Company;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyProfileController extends Controller
{
    use ApiResponse;
    public function update(UpdateCompanyRequest $request)
    {
        $companyId = Auth::user()->id;
        $company = Company::find($companyId);

        $data = $request->validated();
        // Update the company data
        $company->update($data);
    
        return $this->success(200, 'Company profile updated successfully', [
            'Company' => $company
        ]);
    }


    public function resetPassword(ResetPasswordRequest $request) {
        $request->validated();
        $companyId=Auth::user()->id;
        $company = Company::where('id',$companyId)->first();
        // Check current password
        if (!Hash::check($request->current_password, $company->password)) {
            return $this->failed(400, 'Current password is incorrect.');
        }
    
        // Update new password
        $company->password = Hash::make($request->new_password);
        $company->save();
    
        return $this->success(200, 'Password reset successfully.');
    }


    public function showBalance()
    {
        // $balance = Auth::user()->balance;

        // Find the company by its ID
        $company=Auth::user();
        // $company = Company::find(1);

        // Check if the company exists
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        // Get the company wallet
        $wallet = $company->wallet;

        // Check if the wallet exists
        if (!$wallet) {
            return response()->json(['error' => 'Wallet not found for this company'], 404);
        }

        // Prepare the response
        $balanceDetails = new WalletResource($wallet);

        // Return the balance details as a JSON response
        return response()->json($balanceDetails);
    }
}
