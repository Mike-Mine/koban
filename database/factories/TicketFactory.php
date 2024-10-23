<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'status' => fake()->randomElement(['open', 'pending', 'closed']),
            'specialist_id' => fake()->numberBetween(1, 2),
            'client_id' => fake()->numberBetween(3, 12),
        ];
    }
}
