<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\PricingPlan;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@worksphere.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create regular member users
        $members = User::factory(10)->create([
            'role' => 'member',
        ]);

        // Create workspaces
        $workspaces = Workspace::factory(20)->create();

        // Create pricing plans
        PricingPlan::factory()->create([
            'name' => 'Hot Desk - Hourly',
            'description' => 'Perfect for quick work sessions',
            'price' => 10.00,
            'duration' => 'hourly',
            'features' => ['High-speed WiFi', 'Free Coffee', 'Power Outlets'],
            'is_popular' => false,
        ]);

        PricingPlan::factory()->create([
            'name' => 'Dedicated Desk - Daily',
            'description' => 'Your own desk for the day',
            'price' => 50.00,
            'duration' => 'daily',
            'features' => ['High-speed WiFi', 'Free Coffee', 'Locker', 'Printing'],
            'is_popular' => false,
        ]);

        PricingPlan::factory()->create([
            'name' => 'Private Office - Monthly',
            'description' => 'Your own private office space',
            'price' => 800.00,
            'duration' => 'monthly',
            'features' => ['High-speed WiFi', 'Free Coffee', 'Meeting Rooms', 'Printing', '24/7 Access', 'Parking', 'Mail Handling'],
            'is_popular' => true,
        ]);

        PricingPlan::factory()->create([
            'name' => 'Team Office - Monthly',
            'description' => 'Perfect for growing teams',
            'price' => 1500.00,
            'duration' => 'monthly',
            'features' => ['High-speed WiFi', 'Free Coffee', 'Meeting Rooms', 'Printing', '24/7 Access', 'Parking', 'Mail Handling', 'Kitchen Access'],
            'is_popular' => false,
        ]);

        // Create additional pricing plans
        PricingPlan::factory(5)->create();

        // Create testimonials
        Testimonial::factory()->create([
            'name' => 'Sarah Johnson',
            'position' => 'Freelance Designer',
            'company' => 'SJ Design Studio',
            'content' => 'WorkSphere has been a game-changer for my productivity. The atmosphere is perfect, and the amenities are top-notch!',
            'rating' => 5,
            'is_featured' => true,
        ]);

        Testimonial::factory()->create([
            'name' => 'Michael Chen',
            'position' => 'Startup Founder',
            'company' => 'TechVenture Inc',
            'content' => 'The flexibility and professional environment at WorkSphere helped our startup grow. Highly recommended!',
            'rating' => 5,
            'is_featured' => true,
        ]);

        Testimonial::factory()->create([
            'name' => 'Emily Rodriguez',
            'position' => 'Marketing Consultant',
            'company' => 'ER Marketing',
            'content' => 'Great coworking space with amazing community. The meeting rooms are perfect for client presentations.',
            'rating' => 5,
            'is_featured' => true,
        ]);

        // Create additional testimonials
        Testimonial::factory(7)->create();

        // Create bookings for members
        foreach ($members as $member) {
            Booking::factory(rand(1, 5))->create([
                'user_id' => $member->id,
                'workspace_id' => $workspaces->random()->id,
            ]);
        }

        // Create some bookings for admin
        Booking::factory(3)->create([
            'user_id' => $admin->id,
            'workspace_id' => $workspaces->random()->id,
        ]);
    }
}
