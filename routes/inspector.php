<?php

use App\Http\Controllers\InspectorOrderController;
use App\Http\Controllers\InspectorPaymentController;
use App\Http\Controllers\InspectorProjectsController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::apiResource('inspector-orders', InspectorOrderController::class)
  ->middleware('auth:sanctum');
Route::apiResource('inspector-projects', InspectorProjectsController::class)
  ->middleware('auth:sanctum');
Route::post('inspector-reports', [ReportController::class, 'store'])
  ->middleware('auth:sanctum');
Route::get('inspector-reports', [ReportController::class, 'index'])
  ->middleware('auth:sanctum');
Route::get('inspector-payments', [InspectorPaymentController::class, 'index'])
  ->middleware('auth:sanctum');