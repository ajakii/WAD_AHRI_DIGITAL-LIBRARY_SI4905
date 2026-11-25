<?php

namespace App\Providers;

use App\Models\Area;
use App\Models\User;
use App\Policies\AreaPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // === Modul Anggota & Kartu (main) ===

        // Gate: hanya admin yang boleh mengelola data anggota
        Gate::define('kelola-anggota', fn (User $user) => $user->hasRole('admin'));

        // Gate: hanya anggota yang akunnya terhubung ke nomor kartu
        Gate::define('kartu-saya', fn (User $user) => $user->hasRole('anggota') && $user->nomor_kartu !== null);

        // === Modul Fasilitas dan Area (Willbert) ===

        Gate::policy(Area::class, AreaPolicy::class);

        // Admin dan petugas boleh menambah fasilitas
        Gate::define('tambah-area', function (User $user) {
            return in_array($user->role, ['admin', 'petugas']);
        });

        // Admin dan petugas boleh mengedit fasilitas
        Gate::define('edit-area', function (User $user) {
            return in_array($user->role, ['admin', 'petugas']);
        });

        // Hanya admin boleh menghapus fasilitas
        Gate::define('hapus-area', function (User $user) {
            return $user->role === 'admin';
        });
    }
}