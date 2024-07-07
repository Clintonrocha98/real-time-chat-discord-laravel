<?php

namespace Database\Seeders;

use Modules\User\Model\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        User::factory()->create([
            'name' => 'fulano de tal',
            'email' => 'adm1@example.com',
            'password' => '123456789'
        ]);
        User::factory()->create([
            'name' => 'outro fulano',
            'email' => 'adm2@example.com',
            'password' => '123456789'

        ]);
    }
}
