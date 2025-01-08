<?php

include('auth.php');
include('client.php');
include('inspector.php');
include('company.php');

use App\Http\Controllers\API\Company\TermsController;
use App\Http\Controllers\API\Profile\UpdatePasswordController;
use App\Http\Controllers\API\Profile\UpdateProfileController;
use App\Http\Controllers\CityAreaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\NotificationController;


// ************************************************************
// *** city and area
// ************************************************************
Route::get('/cities', [CityAreaController::class, 'cities']);
Route::get('/cities/{city}/areas', [CityAreaController::class, 'CityAreas']);
Route::get('/areas', [CityAreaController::class, 'areas']);
// ************************************************************
// *** Terms and Conditions
// ************************************************************
Route::apiResource("terms", TermsController::class);
// ************************************************************
// *** Notifications
// ************************************************************
Route::apiResource("notifications", NotificationController::class)->middleware('auth:sanctum');
// ************************************************************
// *** Wallet
// ************************************************************
Route::get('wallet', [WalletController::class, 'index'])->middleware('auth:sanctum');
// ************************************************************
// *** Profile
// ************************************************************
Route::post('/update-profile', UpdateProfileController::class)->middleware(['auth:sanctum']);
Route::post('/update-password', UpdatePasswordController::class)->middleware(['auth:sanctum']);