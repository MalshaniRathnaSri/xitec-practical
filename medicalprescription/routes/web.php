<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PrescriptionController;


Route::get('/', function () {
    return view('layout');
});

Route::get('/customer/login',[FormController::class,'show'])->name('customer.login');
Route::post('/patient/registration',[FormController::class,'patientDataStore'])->name('patient.registration');
Route::post('/customer/login', [FormController::class, 'login'])->name('login');

Route::get('/prescription/upload', [PrescriptionController::class,'show'])->name('prescription.upload');