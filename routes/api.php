<?php

use App\Http\Controllers\Company\PropertyController;
use App\Http\Controllers\Company\TermsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource("properties", PropertyController::class);
Route::apiResource("terms", TermsController::class);

