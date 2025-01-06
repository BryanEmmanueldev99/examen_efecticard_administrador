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

        //Usar estas credenciales del administrador
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'test@example.com',
            'password' => 1234567,
            'verified' => 'APROBADO'
        ]);
    }
}
