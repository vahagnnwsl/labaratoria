<?php

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

Route::get('/login', [\App\Http\Controllers\LoginController::class,'showLoginForm']);
Route::post('/logout', [\App\Http\Controllers\LoginController::class,'logout'])->name('logout');
Route::post('/login', [\App\Http\Controllers\LoginController::class,'login'])->name('login');

Route::get('/certificate', [\App\Http\Controllers\PatientController::class,'create'])->name('patient.create');
Route::post('/patient', [\App\Http\Controllers\PatientController::class,'store'])->name('patient.store');
Route::get('/patient/{hash}', [\App\Http\Controllers\PatientController::class,'show'])->name('patient.show');

Route::group(['prefix'=>'dashboard','middleware'=>'auth'],function (){

    Route::get('/', [\App\Http\Controllers\Dashboard\PatientController::class,'index'])->name('patients.index');

    Route::group(['prefix'=>'patients'],function (){
        Route::get('/', [\App\Http\Controllers\Dashboard\PatientController::class,'index'])->name('patients.index');
        Route::get('/{id}/show', [\App\Http\Controllers\Dashboard\PatientController::class,'show'])->name('patients.show');
        Route::get('/{id}/edit', [\App\Http\Controllers\Dashboard\PatientController::class,'edit'])->name('patients.edit');
        Route::put('/{id}/update', [\App\Http\Controllers\Dashboard\PatientController::class,'update'])->name('patients.update');
        Route::delete('/{id}/destroy', [\App\Http\Controllers\Dashboard\PatientController::class,'destroy'])->name('patients.destroy');
        Route::get('/{id}/pdf', [\App\Http\Controllers\Dashboard\PatientController::class,'downloadPdf'])->name('patients.pdf');
        Route::get('/create', [\App\Http\Controllers\Dashboard\PatientController::class,'create'])->name('patients.create');
        Route::post('/store', [\App\Http\Controllers\Dashboard\PatientController::class,'store'])->name('patients.store');
        Route::get('/export', [\App\Http\Controllers\Dashboard\PatientController::class,'export'])->name('patients.export');

    });
});
