<?php

use App\Http\Controllers\InspectorOrderController;
use App\Http\Controllers\InspectorPaymentController;
use App\Http\Controllers\InspectorProjectsController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function () {
  Route::apiResource('inspector-orders', InspectorOrderController::class);
  Route::apiResource('inspector-projects', InspectorProjectsController::class);
  Route::apiResource('inspector-reports', ReportController::class);
  Route::get('inspector-payments', [InspectorPaymentController::class, 'index']);
});