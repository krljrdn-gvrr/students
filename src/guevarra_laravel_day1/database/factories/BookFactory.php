<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(),
            'description' => fake()->sentence(),
            'country_id' => fake()->randomDigitNotNull(),
            'stocks' => fake()->randomDigitNotNull(),
            'amount' => fake()->randomFloat(2),
            'photo' => fake()->imageUrl(640, 480, 'animals', true)
        ];
    }
}
