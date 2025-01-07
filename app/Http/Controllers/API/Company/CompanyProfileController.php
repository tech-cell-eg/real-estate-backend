<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\company\WalletResource;
use App\Traits\ApiResponse;
use DB;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    use ApiResponse;

    public function showBalance()
    {
        // $balance = Auth::user()->balance;

        // Find the company by its ID
        $company = auth('api-company')->user();
        // $company = Company::find(1);

        // Check if the company exists
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        // Get the company wallet
        $wallet = DB::table('wallets')->where('company_id', $company->id)->first();

        // Check if the wallet exists
        if (!$wallet) {
            return response()->json(['error' => 'Wallet not found for this company'], 404);
        }

        // Return the balance details as a JSON response
        return response()->json($wallet);
    }
}
