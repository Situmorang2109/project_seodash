<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ BUAT ADMIN DEFAULT
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Kalau mau tambahkan staff juga bisa
        // User::create([
        //     'name' => 'Staff',
        //     'email' => 'staff@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'staff',
        // ]);
    }
}
