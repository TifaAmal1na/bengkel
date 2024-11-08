<?php

use App\Http\Controllers\aktifitasController;
use App\Http\Controllers\GaugeController;
use App\Http\Controllers\notofikasiController;
use App\Http\Controllers\pekerjaanController;
use App\Http\Controllers\personelController;
use App\Http\Controllers\proyekController;
use App\Http\Controllers\revisiGambarController;
use App\Http\Controllers\toolsController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;
// Auth
use Illuminate\Support\Facades\Auth;
// chart
use App\Http\Controllers\ProyekChartController;
use App\Http\Controllers\PersonelChartController;
use App\Http\Controllers\ToolsChartController;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Protect routes using auth middleware to ensure login is required
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home'); // Redirect to home if authenticated
    }
    return redirect('/login'); // Redirect to login if not authenticated
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Routes that require authentication
Route::middleware('auth')->group(function () {
    Route::resource('personel', PersonelController::class);
    Route::resource('aktivitas', AktifitasController::class);
    Route::resource('notifikasi', NotofikasiController::class);
    Route::resource('pekerjaan', PekerjaanController::class);
    Route::resource('proyek', ProyekController::class);
    Route::resource('revisi_gambar', RevisiGambarController::class);
    Route::resource('tools', ToolsController::class);
    Route::resource('standard', StandardController::class);
});

// Authentication routes
Auth::routes();

// Home route after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Logout route
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//standard route
Route::resource('standard', StandardController::class)
    ->parameters(['standard' => 'standard']);

Route::get('/gauge', [GaugeController::class, 'index'])->name('gauge');

use App\Http\Controllers\ProfileController;

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});