<?php

use App\Http\Controllers\API\Auth\ForgetPassword\ForgetPasswordController;
use App\Http\Controllers\API\Auth\Login\LoginController;
use App\Http\Controllers\API\Auth\Logout\LogoutController;
use App\Http\Controllers\API\Auth\RegisterClient\RegisterClientIndividualController;
use App\Http\Controllers\API\Auth\RegisterClient\RegisterController as AuthClientCompanyRegisterController;
use App\Http\Controllers\API\Auth\RegisterInspector\RegisterController as AuthInspectorRegisterController;
use App\Http\Controllers\API\Auth\RegisterCompany\RegisterController as AuthCompanyRegisterController;
use App\Http\Controllers\API\Auth\RegisterReviewer\RegisterController as AuthReviewerRegisterController;
use App\Http\Controllers\API\Auth\ResetPassword\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::post('/client/register-individual', RegisterClientIndividualController::class)->middleware('throttle:5,1');
Route::post('/client/register-company', AuthClientCompanyRegisterController::class)->middleware('throttle:5,1');
Route::post('/company/register', AuthCompanyRegisterController::class)->middleware('throttle:5,1');
Route::post('/inspector/register', AuthInspectorRegisterController::class)->middleware('throttle:5,1');
Route::post('/reviewer/register', AuthReviewerRegisterController::class);
Route::post('/forget-password', ForgetPasswordController::class)->middleware('throttle:5,1');
Route::post('/reset-password', ResetPasswordController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class)->middleware(['auth:sanctum']);
