<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AuthenticatePatient;

Route::get('/', function () {
    return view('dashboard');
});

/* Customer Login */
Route::get('/customer/login',[FormController::class,'show'])->name('customer.login');
Route::post('/patient/registration',[FormController::class,'patientDataStore'])->name('patient.registration');
Route::post('/login', [FormController::class, 'login'])->name('login');
Route::get('/customer-profile', [FormController::class, 'customerProfile'])
    ->name('customerProfile')
    ->middleware('auth.patient');



/* Prescription Upload */
// Route::get('/prescription/upload', [PrescriptionController::class,'show'])->name('prescription.upload');  
Route::post('/prescriptions/upload', [PrescriptionController::class,'prescriptionStore'])->name('prescription.submit');

/* Admin Login */
Route::get('/admin',[AdminController::class,'loginShow'])->name('admin.login');
Route::get('/admin/registration',[AdminController::class,'registrationShow'])->name('admin.registration');
ROute::post('/admin/registration',[AdminController::class,'adminRegistration'])->name('admin.registration.store');
Route::get('/admin/prescription/preview',[AdminController::class,'index'])->name('admin.prescription.preview');
Route::get('/admin/prescription/preview/{image}', [AdminController::class, 'prescriptionQuotation'])->name('admin.prescription.previewImage');
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');