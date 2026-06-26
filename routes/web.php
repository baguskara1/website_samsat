<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\PindahNamaController;

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

Route::resource('kendaraan', KendaraanController::class);

// Payment Routes
Route::get('/bayar-pajak', [PajakController::class, 'showForm'])->name('bayar_pajak.form');
Route::post('/bayar-pajak', [PajakController::class, 'processPayment'])->name('bayar_pajak.process');

// Pindah Nama Routes
Route::get('/pindah-nama', [PindahNamaController::class, 'index'])->name('pindah_nama.index');
Route::get('/pindah-nama/create', [PindahNamaController::class, 'create'])->name('pindah_nama.create');
Route::post('/pindah-nama', [PindahNamaController::class, 'store'])->name('pindah_nama.store');
Route::get('/pindah-nama/{id}', [PindahNamaController::class, 'show'])->name('pindah_nama.show');
Route::post('/pindah-nama/{id}/complete', [PindahNamaController::class, 'complete'])->name('pindah_nama.complete');
Route::post('/pindah-nama/{id}/reject', [PindahNamaController::class, 'reject'])->name('pindah_nama.reject');

// Auth Routes with Rate Limiting
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->middleware('throttle:5,1')->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->middleware('throttle:3,1')->name('register.process');

// Password Reset Routes with Rate Limiting
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'processForgotPassword'])->middleware('throttle:3,5')->name('forgot.password.send');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('reset.password');
Route::post('/reset-password', [AuthController::class, 'processResetPassword'])->middleware('throttle:5,1')->name('reset.password.process');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::get('/admin/login', [AdminAuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'processAdminLogin'])->middleware('throttle:5,1')->name('admin.login.process');

Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/vehicles', [AdminAuthController::class, 'listVehicles'])->name('admin.vehicles');
    Route::get('/admin/vehicles/create', [AdminAuthController::class, 'createVehicle'])->name('admin.vehicles.create');
    Route::post('/admin/vehicles/store', [AdminAuthController::class, 'storeVehicle'])->name('admin.vehicles.store');
    Route::get('/admin/vehicles/{id}/edit', [AdminAuthController::class, 'editVehicle'])->name('admin.vehicles.edit');
    Route::post('/admin/vehicles/{id}/update', [AdminAuthController::class, 'updateVehicle'])->name('admin.vehicles.update');
    Route::get('/admin/vehicles/{id}/delete', [AdminAuthController::class, 'deleteVehicle'])->name('admin.vehicles.delete');
    Route::get('/admin/users', [AdminAuthController::class, 'listUsers'])->name('admin.users');
    Route::get('/admin/users/create', [AdminAuthController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users/store', [AdminAuthController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{id}/edit', [AdminAuthController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/admin/users/{id}/update', [AdminAuthController::class, 'updateUser'])->name('admin.users.update');
    Route::get('/admin/users/{id}/delete', [AdminAuthController::class, 'deleteUser'])->name('admin.users.delete');
});

// Analytics Routes (Admin only)
Route::middleware('admin.auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/analytics', [\App\Http\Controllers\AnalyticsController::class, 'dashboard'])->name('analytics');
    Route::get('/analytics/vehicles', [\App\Http\Controllers\AnalyticsController::class, 'vehicles'])->name('analytics.vehicles');
    Route::get('/analytics/users', [\App\Http\Controllers\AnalyticsController::class, 'users'])->name('analytics.users');
    Route::get('/analytics/transfers', [\App\Http\Controllers\AnalyticsController::class, 'transfers'])->name('analytics.transfers');
    Route::post('/analytics/export', [\App\Http\Controllers\AnalyticsController::class, 'export'])->name('analytics.export');
});

// Payment Routes
Route::get('/bayar-pajak', [\App\Http\Controllers\PajakController::class, 'showForm'])->name('bayar_pajak.form');
Route::post('/bayar-pajak', [\App\Http\Controllers\PajakController::class, 'processPayment'])->name('bayar_pajak.process');

// Midtrans Webhook Callback (Public - no auth needed)
Route::post('/payment/callback', [\App\Http\Controllers\PajakController::class, 'handleCallback'])->name('payment.callback');

// Admin Payment History Route
Route::middleware('admin.auth')->get('/admin/payments', function () {
    $payments = \App\Models\Payment::where('status', 'completed')
        ->orderBy('paid_at', 'desc')
        ->paginate(20);
    $totalPayments = \App\Models\Payment::count();
    $totalNominal = \App\Models\Payment::where('status', 'completed')->sum('nominal');
    $completedPayments = \App\Models\Payment::where('status', 'completed')->count();
    
    return view('admin_payment_history', compact('payments', 'totalPayments', 'totalNominal', 'completedPayments'));
})->name('admin.payments');

Route::get('/flush-opcache', function () {
    if (function_exists('opcache_reset')) {
        opcache_reset();
        return 'OPcache flushed successfully.';
    }
    return 'OPcache not active.';
});
