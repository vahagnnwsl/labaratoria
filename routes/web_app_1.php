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



Route::get('/login', [\App\Http\App1\Controllers\LoginController::class,'showLoginForm']);
Route::post('/logout', [\App\Http\App1\Controllers\LoginController::class,'logout'])->name('logout');
Route::post('/login', [\App\Http\App1\Controllers\LoginController::class,'login'])->name('login');

Route::get('/certificate', [\App\Http\App1\Controllers\PatientController::class,'create'])->name('patient.create');
Route::post('/patient', [\App\Http\App1\Controllers\PatientController::class,'store'])->name('patient.store');
Route::get('/patient/{hash}', [\App\Http\App1\Controllers\PatientController::class,'show'])->name('patient.show');

Route::group(['prefix'=>'dashboard','middleware'=>'auth'],function (){

    Route::get('/', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'index'])->name('patients.index');

    Route::group(['prefix'=>'patients'],function (){
        Route::get('/', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'index'])->name('patients.index');
        Route::get('/{id}/show', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'show'])->name('patients.show');
        Route::get('/{id}/edit', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'edit'])->name('patients.edit');
        Route::put('/{id}/update', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'update'])->name('patients.update');
        Route::delete('/{id}/destroy', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'destroy'])->name('patients.destroy');
        Route::get('/{id}/pdf', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'downloadPdf'])->name('patients.pdf');
        Route::get('/create', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'create'])->name('patients.create');
        Route::post('/store', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'store'])->name('patients.store');
        Route::get('/export', [\App\Http\App1\Controllers\Dashboard\PatientController::class,'export'])->name('patients.export');
    });

    Route::group(['prefix'=>'2-patients'],function (){
        Route::get('/', [\App\Http\App1\Controllers\Dashboard\Patient2Controller::class,'index'])->name('patients2.index');
        Route::delete('/{id}', [\App\Http\App1\Controllers\Dashboard\Patient2Controller::class,'destroy'])->name('patients2.destroy');
        Route::get('/create', [\App\Http\App1\Controllers\Dashboard\Patient2Controller::class,'create'])->name('patients2.create');
        Route::get('/{id}/show', [\App\Http\App1\Controllers\Dashboard\Patient2Controller::class,'show'])->name('patients2.show');
        Route::get('/{id}/edit', [\App\Http\App1\Controllers\Dashboard\Patient2Controller::class,'edit'])->name('patients2.edit');
        Route::put('/{id}/update', [\App\Http\App1\Controllers\Dashboard\Patient2Controller::class,'update'])->name('patients2.update');
        Route::post('store', [\App\Http\App1\Controllers\Dashboard\Patient2Controller::class,'store'])->name('patients2.store');
        Route::get('/export', [\App\Http\App1\Controllers\Dashboard\Patient2Controller::class,'export'])->name('patients2.export');
        Route::get('/{id}/pdf', [\App\Http\App1\Controllers\Dashboard\Patient2Controller::class,'downloadPdf'])->name('patients2.pdf');

    });
});
