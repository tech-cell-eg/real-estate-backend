<?php
use App\Http\Controllers\API\Auth\Login\LoginController;
use App\Http\Controllers\API\Auth\Logout\LogoutController;
use App\Http\Controllers\API\Auth\RegisterClient\RegisterClientIndividualController;
use App\Http\Controllers\API\Auth\RegisterClient\RegisterController as AuthClientCompanyRegisterController;
use App\Http\Controllers\API\Auth\RegisterCompany\RegisterController as AuthCompanyRegisterController;
use App\Http\Controllers\API\Auth\RegisterInspector\RegisterController as AuthInspectorRegisterController;
use App\Http\Controllers\API\Auth\RegisterReviewer\RegisterController as AuthReviewerRegisterController;
use App\Http\Controllers\API\Auth\ResetPassword\ResetPasswordController;
use App\Http\Controllers\API\Company\CompanyProfileController;
use App\Http\Controllers\API\Company\CompanyPropertyController;
use App\Http\Controllers\API\Company\inspector\InspectorController;
use App\Http\Controllers\API\Company\inspector\InspectorProjectController;
use App\Http\Controllers\API\Company\ProjectCommentsController;
use App\Http\Controllers\API\Company\ProjectNoteController;
use App\Http\Controllers\API\Company\ProjectsController;
use App\Http\Controllers\API\Company\reviewer\ReviewerController;
use App\Http\Controllers\API\Company\reviewer\ReviewerProjectController;
use App\Http\Controllers\API\Company\TermsController;
use App\Http\Controllers\API\Profile\UpdatePasswordController;

use App\Http\Controllers\CardController;
use App\Http\Controllers\CityAreaController;
use App\Http\Controllers\ClientOfferController;
use App\Http\Controllers\ClientPaymentController;
use App\Http\Controllers\ClientPropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\InspectorOrderController;
use App\Http\Controllers\ProjectCommentController;
use App\Http\Controllers\InspectorPaymentController;
use App\Http\Controllers\InspectorProjectsController;


use App\Http\Controllers\API\Profile\UpdateProfileController;
use App\Http\Controllers\Company\reviewer\ReviewerCompanyController;
use App\Http\Controllers\Company\inspector\InspectorCompanyController;

use App\Http\Controllers\API\Auth\ForgetPassword\ForgetPasswordController;
use App\Http\Controllers\API\Auth\RegisterClient\RegisterClientIndividualController;
use App\Http\Controllers\API\Auth\RegisterCompany\RegisterController as AuthCompanyRegisterController;
use App\Http\Controllers\API\Auth\RegisterReviewer\RegisterController as AuthReviewerRegisterController;
use App\Http\Controllers\API\Auth\RegisterInspector\RegisterController as AuthInspectorRegisterController;
use App\Http\Controllers\API\Auth\RegisterClient\RegisterController as AuthClientCompanyRegisterController;
use App\Http\Controllers\CompanyPaymentController;

Route::get('company/projects/search/{status}', [ProjectsController::class, 'search']);


Route::get('/cities', [CityAreaController::class, 'cities']);
Route::get('/cities/{city}/areas', [CityAreaController::class, 'CityAreas']);
Route::get('/areas', [CityAreaController::class, 'areas']);

Route::post('/client/register-individual', RegisterClientIndividualController::class)->middleware('throttle:5,1');
Route::post('/client/register-company', AuthClientCompanyRegisterController::class)->middleware('throttle:5,1');
Route::post('/company/register', AuthCompanyRegisterController::class)->middleware('throttle:5,1');
Route::post('/inspector/register', AuthInspectorRegisterController::class)->middleware('throttle:5,1');
Route::post('/reviewer/register', AuthReviewerRegisterController::class);
Route::post('/forget-password', ForgetPasswordController::class)->middleware('throttle:5,1');
Route::post('/reset-password', ResetPasswordController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class)->middleware(['auth:sanctum']);
Route::post('/update-profile', UpdateProfileController::class)->middleware(['auth:sanctum']);
Route::post('/update-password', UpdatePasswordController::class)->middleware(['auth:sanctum']);

Route::get('/company/balance', [CompanyProfileController::class, 'showBalance'])->middleware(['auth:sanctum']);
Route::apiResource("company/properties", CompanyPropertyController::class)->middleware(['auth:sanctum']);
Route::get("properties/paid", [CompanyPropertyController::class, 'showAllPaid'])->middleware(['auth:sanctum']);
Route::apiResource("terms", TermsController::class);




Route::apiResource("company/projects", ProjectsController::class)->middleware(['auth:sanctum']);

Route::put("projects/inspectors/{id}", [InspectorProjectController::class, 'update'])->middleware(['auth:sanctum']);
Route::put("company/assign/reviewers/", [ReviewerCompanyController::class, 'update'])->middleware(['auth:sanctum']);
Route::put("company/assign/inspectors/", [InspectorCompanyController::class, 'update'])->middleware(['auth:sanctum']);
Route::post("company/property/send-offer/{id}", [ProjectsController::class,'sendRequest'])->middleware(['auth:sanctum']);
Route::post('projects/note',[ProjectNoteController::class,'store'])->middleware(['auth:sanctum']);
Route::get('projects/comments/view/{projectId}',[ProjectCommentsController::class,'getComments'])->middleware(['auth:sanctum']);
Route::get('company/inspectors',[InspectorController::class,'index'])->middleware(['auth:sanctum']);
Route::get('company/inspectors/{inspector_id}',[InspectorController::class,'show'])->middleware(['auth:sanctum']);
Route::post('company/inspectors',[InspectorController::class,'store'])->middleware(['auth:sanctum']);
Route::delete('company/inspectors/{inspector_id}',[InspectorController::class,'destroy'])->middleware(['auth:sanctum']);
Route::put("projects/inspectors/{projectId}", [InspectorProjectController::class,'update'])->middleware(['auth:sanctum']);
Route::apiResource("company/reviewers", ReviewerController::class)->middleware(['auth:sanctum']);
Route::put("projects/reviewers/{projectId}", [ReviewerProjectController::class,'update'])->middleware(['auth:sanctum']);
Route::get('projects/search',[ProjectsController::class,'search']);
//Route::post('projects/note',[ProjectNoteController::class,'addNote']);
Route::post('projects/comments',[ProjectCommentsController::class,'addComment']);
Route::apiResource("company/projects", ProjectsController::class);

Route::apiResource("orders", OrderController::class);
Route::apiResource("cards", CardController::class);
Route::apiResource("payments", PaymentController::class);
Route::apiResource("cards", CardController::class)->middleware('auth:sanctum');
Route::apiResource("client-payments", ClientPaymentController::class)->middleware('auth:sanctum');
Route::apiResource("notifications", NotificationController::class)->middleware('auth:sanctum');
Route::apiResource('properties', ClientPropertyController::class)->middleware('auth:sanctum');
Route::apiResource('client-offers', ClientOfferController::class)->middleware('auth:sanctum');



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

Route::get('wallet', [WalletController::class, 'index'])->middleware('auth:sanctum');
Route::get('project-commeents/{id}', [ProjectCommentController::class, 'show'])
  ->middleware('auth:sanctum');
Route::post('project-commeents/{id}', [ProjectCommentController::class, 'store'])
  ->middleware('auth:sanctum');
  
  
  Route::get('company-payments', [CompanyPaymentController::class, 'index'])
  ->middleware('auth:sanctum');
