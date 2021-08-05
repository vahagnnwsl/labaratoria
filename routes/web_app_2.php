<?php
use Illuminate\Support\Facades\Route;

Route::get('/certificate', [\App\Http\App2\Controllers\PatientController::class,'create'])->name('app2.patient.create');
Route::post('/certificate', [\App\Http\App2\Controllers\PatientController::class,'store'])->name('app2.patient.store');

Route::get('/patient/{hash}', [\App\Http\App2\Controllers\PatientController::class,'show'])->name('app2.patient.show');
