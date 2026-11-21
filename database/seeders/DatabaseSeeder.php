<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Akun Admin
        User::updateOrCreate(
            ['username' => 'nada'],
            [
                'password' => Hash:make('Admin123'),
                'role' => 'admin',
            ]
        );

        // Akun Customer
        User::updateOrCreate(
            ['username' => 'test admin'],
            [
                'role' => 'customer',
            ]
        );
    }
}