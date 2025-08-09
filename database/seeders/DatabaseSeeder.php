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

        User::create([
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'email' => 'admin@example.com',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Kasir',
            'password' => bcrypt('password'),
            'email' => 'kasir@example.com',
            'role' => 'kasir'
        ]);
        User::create([
            'name' => 'owner',
            'password' => bcrypt('password'),
            'email' => 'owner@example.com',
            'role' => 'owner'
        ]);
    }
}
