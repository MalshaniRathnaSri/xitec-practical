<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('layout');
});

/* Customer Login */
Route::get('/customer/login',[FormController::class,'show'])->name('customer.login');
Route::post('/patient/registration',[FormController::class,'patientDataStore'])->name('patient.registration');
Route::post('/customer/login', [FormController::class, 'login'])->name('login');

/* Prescription Upload */
Route::get('/prescription/upload', [PrescriptionController::class,'show'])->name('prescription.upload');
Route::post('/prescriptions/upload', [PrescriptionController::class,'prescriptionStore'])->name('prescription.submit');

/* Admin Login */
Route::get('/admin/prescription/preview',[AdminController::class,'index'])->name('admin.prescription.preview');
Route::get('/admin/prescription/preview/{image}', [AdminController::class, 'prescriptionQuotation'])->name('admin.prescription.previewImage');
