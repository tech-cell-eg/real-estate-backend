<?php

use App\Http\Controllers\API\Auth\ForgetPassword\ForgetPasswordController;
use App\Http\Controllers\API\Auth\Login\LoginController;
use App\Http\Controllers\API\Auth\Logout\LogoutController;
use App\Http\Controllers\API\Auth\RegisterClient\RegisterClientIndividualController;
use App\Http\Controllers\API\Auth\RegisterClient\RegisterController as AuthClientCompanyRegisterController;
use App\Http\Controllers\API\Auth\RegisterCompany\RegisterController as AuthCompanyRegisterController;
use App\Http\Controllers\API\Auth\RegisterInspector\RegisterController as AuthInspectorRegisterController;
use App\Http\Controllers\API\Auth\ResetPassword\ResetPasswordController;
use App\Http\Controllers\CityAreaController;
use App\Http\Controllers\Company\CompanyProfileController;
use App\Http\Controllers\Company\CompanyPropertyController;
use App\Http\Controllers\Company\TermsController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/cities', [CityAreaController::class, 'cities']);
Route::get('/cities/{city}/areas', [CityAreaController::class, 'CityAreas']);
Route::get('/areas', [CityAreaController::class, 'areas']);

Route::post('/client/register-individual', RegisterClientIndividualController::class)->middleware('throttle:5,1');
Route::post('/client/register-company', AuthClientCompanyRegisterController::class)->middleware('throttle:5,1');
Route::post('/company/register', AuthCompanyRegisterController::class)->middleware('throttle:5,1');
Route::post('/inspector/register', AuthInspectorRegisterController::class)->middleware('throttle:5,1');
Route::post('/forget-password', ForgetPasswordController::class)->middleware('throttle:5,1');
Route::post('/reset-password', ResetPasswordController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class)->middleware(['auth:sanctum']);

Route::put('/company/profile/{company}', [CompanyProfileController::class, 'update']);
Route::put('/company/reset-password', [CompanyProfileController::class, 'resetPassword']);
Route::get('/company/balance', [CompanyProfileController::class, 'showBalance']);
Route::apiResource("company/properties", CompanyPropertyController::class);
Route::apiResource("company/terms", TermsController::class);


Route::apiResource("offers", OfferController::class);

Route::apiResource("orders", OrderController::class);