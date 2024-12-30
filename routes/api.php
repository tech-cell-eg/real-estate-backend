<?php

use App\Http\Controllers\Company\CompanyPropertyController;
use App\Http\Controllers\Company\TermsController;
use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource("company/properties", CompanyPropertyController::class);
Route::apiResource("company/terms", TermsController::class);







Route::apiResource("properties", PropertyController::class);
