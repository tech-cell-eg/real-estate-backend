<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\ClientOfferController;
use App\Http\Controllers\ClientPaymentController;
use App\Http\Controllers\ClientPropertyController;
use Illuminate\Support\Facades\Route;

Route::apiResource("cards", CardController::class)->middleware('auth:sanctum');
Route::apiResource("client-payments", ClientPaymentController::class)->middleware('auth:sanctum');
Route::apiResource('properties', ClientPropertyController::class)->middleware('auth:sanctum');
Route::apiResource('client-offers', ClientOfferController::class)->middleware('auth:sanctum');