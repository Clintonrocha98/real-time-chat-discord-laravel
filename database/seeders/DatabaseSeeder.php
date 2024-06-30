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

        User::factory()->create([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => '123456789'
        ]);
        User::factory()->create([
            'name' => 'test2',
            'email' => 'test2@example.com',
            'password' => '123456789'

        ]);
    }
}
