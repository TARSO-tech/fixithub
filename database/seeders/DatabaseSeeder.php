<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin FixItHub',
            'email' => 'admin@fixithub.test',
            'role' => User::ROLE_ADMIN,
            'is_verified' => true,
        ]);

        User::factory()->count(3)->create([
            'role' => User::ROLE_TECHNICIAN,
            'specialization' => 'Laptop Repair',
            'service_area' => 'Northside',
            'is_verified' => true,
        ]);

        User::factory()->count(2)->create([
            'role' => User::ROLE_VOLUNTEER,
            'service_area' => 'Riverside',
            'is_verified' => true,
        ]);

        User::factory()->create([
            'name' => 'Test Customer',
            'email' => 'customer@fixithub.test',
            'role' => User::ROLE_CUSTOMER,
            'service_area' => 'Central City',
        ]);
    }
}
