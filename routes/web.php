<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DataguruController;
use App\Http\Controllers\PresensiHadirController;
use App\Http\Controllers\PresensiPulangController;
use App\Http\Controllers\CetakKartuController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.index');
    Route::resource('dashboard', DashboardController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('dataguru', DataguruController::class);
    Route::post('image-upload', [DataguruController::class, 'storeImage'])->name('image.upload');
    Route::resource('presensihadir', PresensiHadirController::class);
    Route::resource('presensipulang', PresensiPulangController::class);
    Route::resource('cetakkartu', CetakKartuController::class);
});
