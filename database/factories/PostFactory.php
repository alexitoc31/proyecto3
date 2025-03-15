<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title), // Genera un slug a partir del título
            'excerpt' => fake()->text(100), // Un pequeño resumen
            'content' => fake()->paragraph(5), // Contenido largo
            'user_id' => User::factory(), // Relación con User
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
