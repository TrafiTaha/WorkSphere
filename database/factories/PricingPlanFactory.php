<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PricingPlan>
 */
class PricingPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $duration = fake()->randomElement(['hourly', 'daily', 'weekly', 'monthly']);
        $prices = [
            'hourly' => fake()->randomFloat(2, 5, 20),
            'daily' => fake()->randomFloat(2, 30, 100),
            'weekly' => fake()->randomFloat(2, 150, 500),
            'monthly' => fake()->randomFloat(2, 500, 2000),
        ];

        return [
            'name' => fake()->randomElement(['Basic', 'Professional', 'Premium', 'Enterprise']) . ' ' . ucfirst($duration),
            'description' => fake()->sentence(),
            'price' => $prices[$duration],
            'duration' => $duration,
            'features' => fake()->randomElements(
                ['High-speed WiFi', 'Free Coffee', 'Meeting Rooms', 'Printing', '24/7 Access', 'Parking', 'Locker', 'Mail Handling'],
                fake()->numberBetween(3, 6)
            ),
            'is_popular' => fake()->boolean(20),
        ];
    }
}
