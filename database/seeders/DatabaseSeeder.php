<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios
        $users = User::factory(10)->create();

        // Crear categorías
        $categories = Category::factory(5)->create();

        // Crear posts con relaciones aleatorias
        Post::factory(20)->create([
            'user_id' => $users->random()->id,
        ]);
    }
}
