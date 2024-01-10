<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\WelcomeController;




// Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Route::controller(AuthController::class)->group(function () {
//     Route::get('register', 'register')->name('register');
//     Route::post('register', 'registerSave')->name('register.save');

//     Route::get('login', 'login')->name('login');
//     Route::post('login', 'loginAction')->name('login.action');
// });

// // Patient and Reception routes
// Route::resource('patient', PatientController::class);

// // Doctor routes
// Route::get('doctors', [DoctorController::class, 'index'])->name('doctors.index');
// Route::get('doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
// Route::post('doctors', [DoctorController::class, 'store'])->name('doctors.store');
// Route::get('doctors/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');
// Route::get('doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
// Route::put('doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');
// Route::delete('doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');

// // Dashboard routes
// Route::resource('dashboard', DashboardController::class)->only(['index', 'report']);
// Route::get('dashboard/report', [DashboardController::class, 'report'])->name('dashboard.report');

// // Appointment routes
// Route::resource('appointments', AppointmentController::class);

// // Logout route
// Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// // Login route
// Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');


// Public routes
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
});

// Middleware group for authenticated users
Route::middleware(['auth'])->group(function () {
    // Patient and Reception routes
    Route::resource('patient', PatientController::class);

    // Doctor routes
    Route::resource('doctors', DoctorController::class);

    // Dashboard routes
    Route::resource('dashboard', DashboardController::class)->only(['index', 'report']);
    Route::get('dashboard/report', [DashboardController::class, 'report'])->name('dashboard.report');

    // Appointment routes
    Route::resource('appointments', AppointmentController::class);

    // Logout route
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// Login route
Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');



