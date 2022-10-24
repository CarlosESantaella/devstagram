<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'titulo' => fake()->words(2, true),
            'descripcion' => fake()->words(20, true),
            'imagen' => 'eb61cf43-5dbc-40bc-bb45-7423f5b99c2b.jpg',
            'user_id' => fake()->randomElement([6, 8])
        ];
    }
}
