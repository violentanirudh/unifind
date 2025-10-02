<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'code' => strtoupper(fake()->bothify('?##??#')),
            'description' => fake()->paragraph(2),
            'status' => fake()->randomElement(['lost', 'found', 'deposited', 'claimed']),
            'is_visible' => fake()->boolean(20),
            'reported_by' => null,
            'created_at' => fake()->dateTimeBetween('-3 days', 'now'),
        ];
    }
}
