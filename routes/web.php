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

Route::get('/qwertyformgenerator', [\App\Http\Controllers\PatientController::class,'create']);
Route::post('/patient', [\App\Http\Controllers\PatientController::class,'store'])->name('patient.store');
Route::get('/patient/{hash}', [\App\Http\Controllers\PatientController::class,'show'])->name('patient.show');
