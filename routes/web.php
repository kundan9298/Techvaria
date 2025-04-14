<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HRController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\DashboradController;

Route::get('/', [AdminController::class,'index'])->name('admin.login');

Route::post('/admin/login',[AdminController::class,'login']);

// Route::get('/dashbord', function(){
//     return view('dashboard');
// });



Route::middleware(['admin.auth'])->group(function(){

Route::get('/dashbord',[DashboradController::class,'index'])->name('admin.dashboard');






// HR 

Route::get('/hr', [HRController::class, 'index']);
Route::get('hr/add', function(){
    return view('hradd');
});
Route::post('hr/addData',[HRController::class,'add']);
Route::get('hr/edit/{id}', [HRController::class, 'edit']);
Route::post('hr/update/{id}', [HRController::class, 'update']);
Route::get('hr/delete/{id}', [HRController::class, 'delete']);

// candidate
Route::get('/candidate', [CandidateController::class, 'index']);
Route::get('candidate/add', function(){
    return view('candidateadd');
});
Route::post('candidate/addData',[CandidateController::class,'add']);
Route::get('candidate/edit/{id}', [CandidateController::class, 'edit']);
Route::post('candidate/update/{id}', [CandidateController::class, 'update']);
Route::get('candidate/delete/{id}', [CandidateController::class, 'delete']);


//Interview
Route::get('/interview', [InterviewController::class, 'index']);
Route::get('interview/add', [InterviewController::class, 'addForm']);

Route::post('interview/addData',[InterviewController::class,'add']);
Route::get('interview/edit/{id}', [InterviewController::class, 'edit']);
Route::post('interview/update/{id}', [InterviewController::class, 'update']);
Route::get('interview/delete/{id}', [InterviewController::class, 'delete']);

Route::post('interview/update-status',[InterviewController::class, 'updateStatus']);




Route::get('report',[ReportController::class,'index']);
Route::post('report/filtter',[ReportController::class, 'filtter']);



Route::get('calender',[CalenderController::class,'index']);

});