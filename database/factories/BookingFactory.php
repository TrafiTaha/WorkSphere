<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = fake()->dateTimeBetween('-1 month', '+1 month');
        $endTime = (clone $startTime)->modify('+' . fake()->numberBetween(1, 8) . ' hours');

        return [
            'user_id' => \App\Models\User::factory(),
            'workspace_id' => \App\Models\Workspace::factory(),
            'start_time' => $startTime,
            'end_time' => $endTime,
            'total_price' => fake()->randomFloat(2, 20, 500),
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
