<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@weddinginvitation.com',
            'phone' => '081234567890',
            'address' => 'Jakarta, Indonesia',
            'role' => 'admin',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // Create editor user
        User::create([
            'name' => 'Editor',
            'email' => 'editor@weddinginvitation.com',
            'phone' => '081234567891',
            'address' => 'Bandung, Indonesia',
            'role' => 'editor',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // Create sample customer
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '081234567892',
            'address' => 'Surabaya, Indonesia',
            'role' => 'customer',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
    }
}
