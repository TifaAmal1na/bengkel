<?php

use App\Http\Controllers\aktifitasController;
use App\Http\Controllers\notofikasiController;
use App\Http\Controllers\pekerjaanController;
use App\Http\Controllers\proyekController;
use App\Http\Controllers\revisiGambarController;
use App\Http\Controllers\toolsController;
use App\Http\Controllers\workloadAnalysisController;
use Illuminate\Support\Facades\Route;
// chart
use App\Http\Controllers\ProyekChartController;
use App\Http\Controllers\PersonelChartController;
use App\Http\Controllers\ToolsChartController;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view ('dashboard');
})->name('dashboard');

Route::get('/personel', [App\Http\Controllers\personelController::class, 'personel'])->name('personel');
Route::resource('aktifitas', AktifitasController::class);
Route::resource('notifikasi', NotofikasiController::class);
Route::resource('pekerjaan', PekerjaanController::class);
Route::resource('proyek', ProyekController::class);
Route::resource('revisi_gambar', RevisiGambarController::class);
Route::resource('tools', ToolsController::class);
Route::resource('workload_analysis', WorkloadAnalysisController::class);

// chart
Route::get('/ChartProyek', [ProyekChartController::class, 'index'])->name('proyek.chart');
Route::get('/ChartPersonel', [PersonelChartController::class, 'index'])->name('personel.chart');
Route::get('/ChartTools', [ToolsChartController::class, 'index'])->name('tools.chart');
