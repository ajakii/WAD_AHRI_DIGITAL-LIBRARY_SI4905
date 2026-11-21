<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AuthController;


Route::get('/', [PengaduanController::class, 'index'])
    ->name('home');

Route::post('/pengaduan', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');


Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.proses');

});


Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    Route::middleware('can:akses-pengaduan')->group(function () {

        Route::get('/daftar-aduan', [PengaduanController::class, 'daftar'])
            ->name('pengaduan.daftar');

        // EDIT
        Route::get('/pengaduan/{pengaduan}/edit', [PengaduanController::class, 'edit'])
            ->name('pengaduan.edit')
            ->can('update', 'pengaduan');

        // UPDATE
        Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update'])
            ->name('pengaduan.update')
            ->can('update', 'pengaduan');

        // DELETE
        Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])
            ->name('pengaduan.destroy')
            ->can('delete', 'pengaduan');

    });


    Route::middleware('can:kelola-aduan')->group(function () {

        Route::get('/admin/dashboard', function () {
            return 'Halaman khusus Admin';
        })->name('admin.dashboard');

    });


    Route::middleware('can:akses-customer')->group(function () {

        Route::get('/customer/dashboard', function () {
            return 'Halaman khusus Customer';
        })->name('customer.dashboard');

    });

});