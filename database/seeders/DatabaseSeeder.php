<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 agents only
        // $agents = \App\Models\Agent::factory(3)->create();

        // Create 10 users
        $clients = \App\Models\User::factory(10)->create();
        $this->call([
            AgentSeeder::class,
            PropertySeeder::class,
            PropertyImageSeeder::class,
        ]);


        // Create 10 preferences with random user and property assignments
        foreach (range(1, 10) as $index) {
            \App\Models\Preferences::factory()->create([
                'user_id' => $clients->random()->id, // Assign random client
                'property_id' => \App\Models\Property::inRandomOrder()->first()->id, // Get random property
            ]);
        }

        // Create 10 inquiries with random user and property assignments
        foreach (range(1, 10) as $index) {
            \App\Models\Inquiry::factory()->create([
                'user_id' => $clients->random()->id, // Assign random client
                'property_id' => \App\Models\Property::inRandomOrder()->first()->id, // Get random property
            ]);
        }
    }
}
