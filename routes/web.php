<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[\App\Http\Controllers\LoginController::class,'index']);
Route::post('custom-login', [\App\Http\Controllers\LoginController::class,'customLogin'])->name('login.custom');


Route::group([ 'middleware' =>'super'], function (){

    //Dashboard routes
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

    //student routes
    Route::get('/students',[\App\Http\Controllers\StudentController::class,'index'])->name('students');
    Route::post('/studentsStore',[\App\Http\Controllers\StudentController::class,'Store'])->name('StoreS');

    //Q&s routes
    Route::get('/Qa',[\App\Http\Controllers\QsController::class,'index'])->name('qs');
    Route::post('/QaStore',[\App\Http\Controllers\QsController::class,'Store'])->name('StoreQa');
    //Result routes
    Route::get('/result',[\App\Http\Controllers\ResultController::class,'index'])->name('result');

});

//Exam routes
Route::get('/frontend',[\App\Http\Controllers\ExamController::class,'index'])->name('frontend');
Route::get('/frontend_exam',[\App\Http\Controllers\ExamController::class,'viewExam'])->name('frontend.exam');
Route::post('result/{id}',[\App\Http\Controllers\ExamController::class,'result'])->name('resultExam');

