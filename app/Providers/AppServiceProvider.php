<?php

namespace App\Providers;

use App\Models\User;
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

        // Gate modul Area (sesuai routes/web.php)
        Gate::define('tambah-area', fn (User $user) => $user->hasRole('admin', 'petugas'));
        Gate::define('edit-area', fn (User $user) => $user->hasRole('admin', 'petugas'));
        Gate::define('hapus-area', fn (User $user) => $user->hasRole('admin'));

        // Gate modul Anggota (dari main)
        Gate::define('kelola-anggota', fn (User $user) => $user->hasRole('admin'));
        Gate::define('kartu-saya', fn (User $user) => $user->hasRole('anggota') && $user->nomor_kartu !== null);
    }
}