<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;


Route::get('/', function () {
    return view('index');
});

Route::get('/checkout/ff', function () {
    return view('topup.sorry');
});

Route::get('/checkout/genshin', function () {
    return view('topup.sorry');
});

Route::get('/checkout/pubg', function () {
    return view('topup.sorry');
});

// Guest Routes (Hanya bisa diakses jika belum login)
Route::middleware('guest:customer')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // Route Google Socialite
    Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

// Rute yang WAJIB LOGIN dulu
Route::middleware(['auth:customer'])->group(function () {
    Route::get('/checkout/mlbb', [TopUpController::class, 'showForm'])->name('topup.form');
    Route::post('/payment', [TopUpController::class, 'processPayment'])->name('topup.payment.process');
    Route::post('/payment/success-callback', [TopUpController::class, 'successCallback'])->name('topup.callback');
    Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');
});

Route::get('/login/admin', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login/admin', [LoginAdminController::class, 'login'])->name('admin.login.submit');

// Register Admin Routes
Route::get('/register/admin', [LoginAdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/register/admin', [LoginAdminController::class, 'register'])->name('admin.register.submit');

// Route Auth Admin (Harus Login Admin)
Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard/admin', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout/admin', [LoginAdminController::class, 'logout'])->name('logout');
});


// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth:customer');
