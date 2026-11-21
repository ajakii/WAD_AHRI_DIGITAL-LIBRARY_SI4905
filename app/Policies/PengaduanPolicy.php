<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pengaduan;

class PengaduanPolicy
{
    public function update(User $user, Pengaduan $pengaduan): bool
    {
        return $user->hasRole('admin')
            || (
                $user->hasRole('customer')
                && $pengaduan->status !== 'Selesai'
            );
    }

    public function delete(User $user, Pengaduan $pengaduan): bool
    {
        return $user->hasRole('admin');
    }
}