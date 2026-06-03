<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Sumaya',
            'email' => 'sumaya@gmail.com',
            'password' => Hash::make('sumaya123'),
            'role' => UserRole::Admin,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Aabo',
            'email' => 'aabo@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => UserRole::Guest,
            'email_verified_at' => now(),
        ]);

        $this->call(StudentSeeder::class);
    }
}
