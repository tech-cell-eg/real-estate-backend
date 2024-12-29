<?php

use App\Http\Controllers\API\Auth\AuthClient\RegisterController;
use App\Http\Controllers\API\Auth\AuthCompany\RegisterController as AuthCompanyRegisterController;
use App\Http\Controllers\API\Auth\AuthInspector\RegisterController as AuthInspectorRegisterController;
use App\Http\Controllers\CityAreaController;
use Illuminate\Support\Facades\Route;

Route::get('/cities', [CityAreaController::class, 'cities']);
Route::get('/cities/{city}/areas', [CityAreaController::class, 'CityAreas']);
Route::get('/areas', [CityAreaController::class, 'areas']);

Route::post('/client/register-individual', [RegisterController::class, 'registerClientIndividual'])->middleware('throttle:5,1');
Route::post('/client/register-company', [RegisterController::class, 'registerClientCompany'])->middleware('throttle:5,1');

Route::post('/company/register', AuthCompanyRegisterController::class)->middleware('throttle:5,1');

Route::post('/inspector/register', AuthInspectorRegisterController::class)->middleware('throttle:5,1');
