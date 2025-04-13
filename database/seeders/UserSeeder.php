<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567890',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti@example.com',
                'password' => Hash::make('password'),
                'phone' => '082345678901',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
