<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Auth\LoginController;



Auth::routes();

Route::get('/', [WebsiteController::class, 'index']);
Route::get('departments/{departmentID}/doctors-list', [WebsiteController::class, 'doctorsList']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/log-out', [LoginController::class, 'logout']);

Route::middleware(['auth', 'user-access:doctor'])->group(function() {
    Route::get('/doctor', [DoctorController::class, 'index']);
    Route::get('/doctor/{patientID}/patient-history', [DoctorController::class, 'patientHistory']);
    Route::any('/doctor/{appointmentID}/edit', [DoctorController::class, 'editAppointment']);
    Route::get('/doctor/{appointmentID}/delete', [DoctorController::class, 'deleteAppointment']);
    Route::get('/doctor/edit', [PatientController::class, 'edit']);
    Route::post('/doctor/update', [PatientController::class, 'update']);
});
Route::middleware(['auth', 'user-access:patient'])->group(function() {
    Route::get('/patient', [PatientController::class, 'index']);
    Route::get('/patient/doctors-list', [PatientController::class, 'doctorsList']);
    Route::any('/patient/{doctorID}/book-an-appointment-with-doctor', [PatientController::class, 'bookAnAppointmentWithDoctor']);
    Route::get('/patient/edit', [PatientController::class, 'edit']);
    Route::post('/patient/update', [PatientController::class, 'update']);
});


