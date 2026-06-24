<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;

// Public routes
Route::get('/', function () {
    return view('index');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/Daftar_kendaraan', [KendaraanController::class, 'index']);

// Webhook for deployment
Route::post('/webhook-deploy', function () {
    shell_exec('/var/www/website_samsat/deploy.sh');
    return 'Deployed!';
});


Route::resource('kendaraan', KendaraanController::class);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});