<?php

use App\Http\Controllers\Company\CompanyPropertyController;
use App\Http\Controllers\Company\TermsController;
use App\Http\Controllers\PropertyController;

use App\Http\Controllers\OfferController;
use App\Http\Controllers\API\Auth\AuthClient\RegisterClientCompanyController;
use App\Http\Controllers\API\Auth\AuthClient\RegisterClientIndividualController;
use App\Http\Controllers\API\Auth\AuthCompany\RegisterController as AuthCompanyRegisterController;
use App\Http\Controllers\API\Auth\AuthInspector\RegisterController as AuthInspectorRegisterController;
use App\Http\Controllers\CityAreaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/cities', [CityAreaController::class, 'cities']);
Route::get('/cities/{city}/areas', [CityAreaController::class, 'CityAreas']);
Route::get('/areas', [CityAreaController::class, 'areas']);

Route::post('/client/register-individual', RegisterClientIndividualController::class)->middleware('throttle:5,1');
Route::post('/client/register-company', RegisterClientCompanyController::class)->middleware('throttle:5,1');

Route::post('/company/register', AuthCompanyRegisterController::class)->middleware('throttle:5,1');

Route::post('/inspector/register', AuthInspectorRegisterController::class)->middleware('throttle:5,1');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource("company/properties", CompanyPropertyController::class);
Route::apiResource("company/terms", TermsController::class);


Route::apiResource("properties", PropertyController::class);
Route::apiResource("offers", OfferController::class);

