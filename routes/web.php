<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PenghuluController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Autentikasi (Registrasi & Login)
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk Calon Pengantin (Harus sudah login)
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/schedule', [UserController::class, 'showSchedule'])->name('schedule');
    Route::get('/form', [UserController::class, 'showForm'])->name('form');
    Route::post('/submit-form', [UserController::class, 'submitForm'])->name('submit.form');
    Route::get('/success', [UserController::class, 'showSuccessPage'])->name('success');
});

// Rute untuk Staff KUA (Harus sudah login dan memiliki peran 'staff')
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
    Route::get('/registrations', [StaffController::class, 'showRegistrations'])->name('registrations');
    Route::get('/registration/{id}', [StaffController::class, 'showRegistrationDetail'])->name('registration.detail');
    Route::post('/registration/confirm/{id}', [StaffController::class, 'confirmRegistration'])->name('registration.confirm');
});

// Rute untuk Penghulu (Harus sudah login dan memiliki peran 'penghulu')
Route::middleware(['auth', 'role:penghulu'])->prefix('penghulu')->name('penghulu.')->group(function () {
    Route::get('/dashboard', [PenghuluController::class, 'dashboard'])->name('dashboard');
});