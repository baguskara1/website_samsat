<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PindahNamaController;
use App\Http\Controllers\AdminAuthController;

// Public routes
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

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

// Pindah Nama Routes
Route::get('/pindah-nama', [PindahNamaController::class, 'index'])->name('pindah_nama.index');
Route::get('/pindah-nama/create', [PindahNamaController::class, 'create'])->name('pindah_nama.create');
Route::post('/pindah-nama', [PindahNamaController::class, 'store'])->name('pindah_nama.store');
Route::get('/pindah-nama/{id}', [PindahNamaController::class, 'show'])->name('pindah_nama.show');
Route::post('/pindah-nama/{id}/complete', [PindahNamaController::class, 'complete'])->name('pindah_nama.complete');
Route::post('/pindah-nama/{id}/reject', [PindahNamaController::class, 'reject'])->name('pindah_nama.reject');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::get('/admin/login', [AdminAuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'processAdminLogin'])->name('admin.login.process');

Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/vehicles', [AdminAuthController::class, 'listVehicles'])->name('admin.vehicles');
    Route::get('/admin/vehicles/create', [AdminAuthController::class, 'createVehicle'])->name('admin.vehicles.create');
    Route::get('/admin/vehicles/{id}/edit', [AdminAuthController::class, 'editVehicle'])->name('admin.vehicles.edit');
    Route::get('/admin/vehicles/{id}/delete', [AdminAuthController::class, 'deleteVehicle'])->name('admin.vehicles.delete');
    Route::get('/admin/users', [AdminAuthController::class, 'listUsers'])->name('admin.users');
    Route::get('/admin/users/create', [AdminAuthController::class, 'createUser'])->name('admin.users.create');
    Route::get('/admin/users/{id}/edit', [AdminAuthController::class, 'editUser'])->name('admin.users.edit');
    Route::get('/admin/users/{id}/delete', [AdminAuthController::class, 'deleteUser'])->name('admin.users.delete');
});