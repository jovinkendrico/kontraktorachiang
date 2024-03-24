<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Master\BarangController;
use App\Http\Controllers\Admin\Project\KasKeluarController;
use App\Http\Controllers\Admin\Project\PembelianBarangController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(BarangController::class)->middleware('auth')->prefix('admin/master/barang')->name('admin.master.barang.')->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
    Route::get('/restore/{id}', 'restore')->name('restore');
});

Route::controller(ProjectController::class)->middleware('auth')->prefix('admin/project/project')->name('admin.project.project.')->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
    Route::get('/restore/{id}', 'restore')->name('restore');
});

Route::controller(PembelianBarangController::class)->middleware('auth')->prefix('admin/project/pembelianbarang')->name('admin.project.pembelianbarang.')->group(function () {
    Route::get('/index/{id}', 'index')->name('index');
    Route::get('/create/{id}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
});

Route::controller(KasKeluarController::class)->middleware('auth')->prefix('admin/project/kaskeluar')->name('admin.project.kaskeluar.')->group(function () {
    Route::get('/index/{id}', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
});

require __DIR__ . '/auth.php';
