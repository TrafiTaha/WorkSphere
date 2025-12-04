<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workspace>
 */
class WorkspaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(['desk', 'office', 'meeting_room']);
        $names = [
            'desk' => ['Hot Desk', 'Dedicated Desk', 'Window Desk', 'Corner Desk', 'Standing Desk'],
            'office' => ['Private Office', 'Executive Office', 'Team Office', 'Corner Office', 'Glass Office'],
            'meeting_room' => ['Conference Room', 'Board Room', 'Huddle Room', 'Presentation Room', 'Collaboration Space'],
        ];

        return [
            'name' => fake()->randomElement($names[$type]) . ' ' . fake()->numberBetween(1, 20),
            'type' => $type,
            'description' => fake()->paragraph(),
            'price_per_hour' => fake()->randomFloat(2, 5, 50),
            'price_per_day' => fake()->randomFloat(2, 30, 300),
            'capacity' => $type === 'desk' ? 1 : fake()->numberBetween(2, 12),
            'image' => null,
            'is_available' => fake()->boolean(90),
            'amenities' => fake()->randomElements(
                ['WiFi', 'Coffee', 'Whiteboard', 'Monitor', 'Printer', 'Phone', 'Projector', 'Air Conditioning'],
                fake()->numberBetween(3, 6)
            ),
        ];
    }
}
