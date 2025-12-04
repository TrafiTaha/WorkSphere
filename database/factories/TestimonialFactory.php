<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->jobTitle(),
            'company' => fake()->company(),
            'content' => fake()->paragraph(3),
            'rating' => fake()->numberBetween(4, 5),
            'avatar' => null,
            'is_featured' => fake()->boolean(30),
        ];
    }
}
