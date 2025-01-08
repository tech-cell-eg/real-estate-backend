<?php

use App\Http\Controllers\API\Company\CompanyProfileController;
use App\Http\Controllers\API\Company\CompanyPropertyController;
use App\Http\Controllers\API\Company\inspector\InspectorCompanyController;
use App\Http\Controllers\API\Company\inspector\InspectorController;
use App\Http\Controllers\API\Company\inspector\InspectorProjectController;
use App\Http\Controllers\API\Company\ProjectCommentsController;
use App\Http\Controllers\API\Company\ProjectNoteController;
use App\Http\Controllers\API\Company\ProjectsController;
use App\Http\Controllers\API\Company\reviewer\ReviewerCompanyController;
use App\Http\Controllers\API\Company\reviewer\ReviewerController;
use App\Http\Controllers\API\Company\reviewer\ReviewerProjectController;
use App\Http\Controllers\CompanyPaymentController;
use App\Http\Controllers\ProjectCommentController;
use Illuminate\Support\Facades\Route;

Route::get('company/projects/search/{status}', [ProjectsController::class, 'search']);
Route::get('/company/balance', [CompanyProfileController::class, 'showBalance'])->middleware(['auth:sanctum']);
Route::apiResource("company/properties", CompanyPropertyController::class)->middleware(['auth:sanctum']);
Route::get("properties/paid", [CompanyPropertyController::class, 'showAllPaid'])->middleware(['auth:sanctum']);
Route::apiResource("company/projects", ProjectsController::class)->middleware(['auth:sanctum']);
Route::put("projects/inspectors/{id}", [InspectorProjectController::class, 'update'])->middleware(['auth:sanctum']);
Route::put("company/assign/reviewers/", [ReviewerCompanyController::class, 'update'])->middleware(['auth:sanctum']);
Route::put("company/assign/inspectors/", [InspectorCompanyController::class, 'update'])->middleware(['auth:sanctum']);
Route::post("company/property/send-offer/{id}", [ProjectsController::class, 'sendRequest'])->middleware(['auth:sanctum']);
Route::post('projects/note', [ProjectNoteController::class, 'store'])->middleware(['auth:sanctum']);
Route::get('projects/comments/view/{projectId}', [ProjectCommentsController::class, 'getComments'])->middleware(['auth:sanctum']);
Route::apiResource('company/inspectors', InspectorController::class)->middleware('auth:sanctum');
Route::put("projects/inspectors/{projectId}", [InspectorProjectController::class, 'update'])->middleware(['auth:sanctum']);
Route::apiResource("company/reviewers", ReviewerController::class)->middleware(['auth:sanctum']);
Route::put("projects/reviewers/{projectId}", [ReviewerProjectController::class, 'update'])->middleware(['auth:sanctum']);
Route::get('projects/search', [ProjectsController::class, 'search']);
Route::post('projects/comments', [ProjectCommentsController::class, 'addComment']);
Route::apiResource("company/projects", ProjectsController::class);
Route::get('project-commeents/{id}', [ProjectCommentController::class, 'show'])
  ->middleware('auth:sanctum');
Route::post('project-commeents/{id}', [ProjectCommentController::class, 'store'])
  ->middleware('auth:sanctum');

Route::get('company-payments', [CompanyPaymentController::class, 'index'])
  ->middleware('auth:sanctum');
