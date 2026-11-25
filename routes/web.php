<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Halaman utama publik
Route::get('/', [AreaController::class, 'index'])->name('area.index');
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('home');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// Login (hanya untuk guest / belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:6,1')
        ->name('login.proses');
});

// Route yang membutuhkan login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Modul Fasilitas & Area (Willbert / main)
    Route::get('/area/tambah', [AreaController::class, 'create'])
        ->can('tambah-area')
        ->name('area.create');
    Route::post('/area', [AreaController::class, 'store'])
        ->can('tambah-area')
        ->name('area.store');
    Route::get('/area/{area}/edit', [AreaController::class, 'edit'])
        ->can('edit-area')
        ->name('area.edit');
    Route::put('/area/{area}', [AreaController::class, 'update'])
        ->can('edit-area')
        ->name('area.update');
    Route::delete('/area/{area}', [AreaController::class, 'destroy'])
        ->can('hapus-area')
        ->name('area.destroy');

    // Modul Anggota (main)
    Route::get('/kartu-saya', [AnggotaController::class, 'kartuSaya'])
        ->name('anggota.kartu-saya')
        ->can('kartu-saya');

    Route::get('/anggota/{anggota}/cetak', [AnggotaController::class, 'cetak'])
        ->name('anggota.cetak')
        ->can('cetak', 'anggota');

    Route::middleware('role:admin')->group(function () {
        Route::get('/anggota/tambah', [AnggotaController::class, 'create'])
            ->name('anggota.create')
            ->can('kelola-anggota');
        Route::post('/anggota', [AnggotaController::class, 'store'])
            ->name('anggota.store')
            ->can('kelola-anggota');

        Route::get('/anggota/{anggota}/edit', [AnggotaController::class, 'edit'])
            ->name('anggota.edit')
            ->can('update', 'anggota');
        Route::put('/anggota/{anggota}', [AnggotaController::class, 'update'])
            ->name('anggota.update')
            ->can('update', 'anggota');
        Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])
            ->name('anggota.destroy')
            ->can('delete', 'anggota');
    });

    // Modul Pengaduan (NADA)
    Route::middleware('can:akses-pengaduan')->group(function () {
        Route::get('/daftar-aduan', [PengaduanController::class, 'daftar'])
            ->name('pengaduan.daftar');

        Route::get('/pengaduan/{pengaduan}/edit', [PengaduanController::class, 'edit'])
            ->name('pengaduan.edit')
            ->can('update', 'pengaduan');

        Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update'])
            ->name('pengaduan.update')
            ->can('update', 'pengaduan');

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

// Tes koneksi database
Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return 'DB berhasil connect!';
    } catch (\Exception $e) {
        return 'DB gagal connect: ' . $e->getMessage();
    }
});