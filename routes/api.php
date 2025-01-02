<?php

use App\Http\Controllers\Company\CompanyPropertyController;
use App\Http\Controllers\Company\TermsController;

use App\Http\Controllers\OfferController;
use App\Http\Controllers\API\Auth\AuthClient\RegisterClientCompanyController;
use App\Http\Controllers\API\Auth\AuthClient\RegisterClientIndividualController;
use App\Http\Controllers\API\Auth\AuthCompany\RegisterController as AuthCompanyRegisterController;
use App\Http\Controllers\API\Auth\AuthInspector\RegisterController as AuthInspectorRegisterController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CityAreaController;
use App\Http\Controllers\Company\CompanyProfileController;
use App\Http\Controllers\Company\inspector\InspectorController;
use App\Http\Controllers\Company\inspector\InspectorProjectController;
use App\Http\Controllers\Company\ProjectCommentsController;
use App\Http\Controllers\Company\ProjectNoteController;
use App\Http\Controllers\Company\ProjectsController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/cities', [CityAreaController::class, 'cities']);
Route::get('/cities/{city}/areas', [CityAreaController::class, 'CityAreas']);
Route::get('/areas', [CityAreaController::class, 'areas']);

Route::post('/client/register-individual', RegisterClientIndividualController::class)->middleware('throttle:5,1');
Route::post('/client/register-company', RegisterClientCompanyController::class)->middleware('throttle:5,1');

Route::post('/company/register', AuthCompanyRegisterController::class)->middleware('throttle:5,1');

Route::post('/inspector/register', AuthInspectorRegisterController::class)->middleware('throttle:5,1');

Route::put('/company/profile/{company}', [CompanyProfileController::class, 'update']);
Route::put('/company/reset-password', [CompanyProfileController::class, 'resetPassword']);
Route::get('/company/balance', [CompanyProfileController::class, 'showBalance']);
Route::apiResource("company/properties", CompanyPropertyController::class);
Route::apiResource("company/terms", TermsController::class);


Route::apiResource("offers", OfferController::class);

Route::apiResource("orders", OrderController::class);

Route::apiResource("company/projects", ProjectsController::class);
Route::post('projects/note',[ProjectNoteController::class,'store']);
Route::post('projects/comments',[ProjectCommentsController::class,'store']);
Route::get('projects/comments/view/{projectId}',[ProjectCommentsController::class,'show']);
Route::get('company/inspectors',[InspectorController::class,'index']);
Route::apiResource("company/inspectors", InspectorController::class);
Route::put("projects/inspectors/{id}", [InspectorProjectController::class,'update']);


Route::apiResource("cards", CardController::class);