<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobadderController;
use App\Http\Controllers\XeroController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JobController;
use \Webfox\Xero\Controllers\AuthorizationController;
use \Webfox\Xero\Controllers\AuthorizationCallbackController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, function (Request $request) {
        return $request->user();
    }]);
    Route::put('/me', [UserController::class, 'update_client_profile']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/dashboard_jobadder', [JobadderController::class, 'dashboard_jobadder_data'])->name('dashboard_jobadder');
    Route::get('/communities', [CommunityController::class, 'index']);
    Route::get('/my_business', [App\Http\Controllers\UserController::class, 'my_business'])->name('my_business');
    Route::get('/documents', [App\Http\Controllers\UserController::class, 'documents']);
    Route::get('/knowledges', [App\Http\Controllers\KnowledgeBaseController::class, 'index']);
    Route::post('/my_business_search', [App\Http\Controllers\UserController::class, 'my_business'])->name('my_business_search');
    Route::get('/xero', [\App\Http\Controllers\XeroController::class, 'index'])->name('xero.auth.success');
    Route::resource('/employees', App\Http\Controllers\EmployeeController::class);
    Route::post('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'update']);
    Route::get('fullcalender/{client_id?}', [App\Http\Controllers\EventController::class, 'index']);
    Route::resource('/events', App\Http\Controllers\EventController::class);
    Route::post('fullcalenderAjax', [App\Http\Controllers\EventController::class, 'add_update_delete']);
    Route::resource('/tickets', App\Http\Controllers\TicketController::class);
    Route::post('/tickets/search', [App\Http\Controllers\TicketController::class, 'search'])->name('tickets.search');
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::post('/users/{users}', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('/client_doc_search/{client_id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('client_doc_search');

    Route::get('/get_employee', [App\Http\Controllers\EmployeeController::class, 'getEmployee'])->name('getEmployee');
    Route::get('/client_list', [App\Http\Controllers\EmployeeController::class, 'client_list'])->name('client_list');
    Route::get('/employee_list/{client_id}', [App\Http\Controllers\EmployeeController::class, 'employee_list'])->name('employee_list');

    Route::post('hr_docs', [App\Http\Controllers\UserController::class, 'hr_documents'])->name('hr_docs');

    Route::post('/client_hrdoc_search/{client_id}', [App\Http\Controllers\EmployeeController::class, 'employee_list'])->name('client_hrdoc_search');
    Route::resource('jobs', App\Http\Controllers\JobController::class);
    Route::post('/jobs/search', [App\Http\Controllers\JobController::class, 'search'])->name('job.search');
    Route::get('/jobshared', [App\Http\Controllers\JobController::class, 'jobshared_list'])->name('job.shared');
    Route::post('/jobs/apply', [App\Http\Controllers\JobController::class, 'apply'])->name('job.apply');
    Route::get('/client_events_list/{user_id?}', [App\Http\Controllers\EventController::class, 'client_events_list'])->name('client_events_list');
    Route::post('/employee_search', [App\Http\Controllers\EmployeeController::class, 'employee_search'])->name('employee_search');
    Route::get('/ga', [HomeController::class, 'getAnalyticsData']);
    Route::get('/jobadder', [\App\Http\Controllers\JobadderController::class, 'jobadder'])->name('jobadder');
    Route::get('/jobadder_data', [\App\Http\Controllers\JobadderController::class, 'get_jobs'])->name('get_jobs');
    Route::get('/xero/auth/authorize', AuthorizationController::class)->name('xero.auth.authorize');
    Route::get('/xero/auth/callback', AuthorizationCallbackController::class)->name('xero.auth.callback');
    Route::get('/get_cv', [\App\Http\Controllers\JobadderController::class, 'get_CV_Attachment'])->name('get_cv');
});
