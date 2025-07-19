<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@undanganonline.com',
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Create regular user for testing
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'customer',
            'is_active' => true,
        ]);

        // Run template seeder
        $this->call([
            TemplateSeeder::class,
        ]);
    }
}