<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('akses-pengaduan', function (User $user) {
            return $user->hasRole('admin', 'customer');
        });

        Gate::define('kelola-aduan', function (User $user) {
            return $user->hasRole('admin');
        });

        Gate::define('akses-customer', function (User $user) {
            return $user->hasRole('customer');
        });
    }
}