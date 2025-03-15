<?php

namespace Database\Seeders;

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
        // Crear dos usuarios específicos
        User::create([
            'name' => 'alexito',
            'email' => 'alexito@gami.com',
            'password' => Hash::make('alexito123'),
        ]);

        User::create([
            'name' => 'tobar',
            'email' => 'tobar@gmail.com',
            'password' => Hash::make('tobar123'),
        ]);

        // Crear 10 usuarios de prueba con factories
        User::factory()->count(10)->create();
    }
}
