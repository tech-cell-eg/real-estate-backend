<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Traits\ApiResponse;

class WalletController extends Controller
{
    use ApiResponse;

    function index() {
        if (auth('api-inspector')->check()) {
            $wallet = Wallet::where('owner_id', auth('api-inspector')->id())
            ->where('owner_type', 'inspector')->first();
            return $this->success(200, 'wallet found!', $wallet);
        }

        if (auth('api-company')->check()) {
            $wallet = Wallet::where('owner_id', auth('api-company')->id())
            ->where('owner_type', 'company')->first();
            return $this->success(200, 'wallet found!', $wallet);
        }
        
        return $this->failed(402, 'wallet not found!');
    }
}
