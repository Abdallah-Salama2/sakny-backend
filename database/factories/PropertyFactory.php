<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Property>
 */
final class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'by_agent_id' => \App\Models\Agent::factory(),
            'title' => fake()->title,
            'description' => fake()->text,
            'city' => fake()->city,
            'address' => fake()->address,
            'latitude' => fake()->optional()->randomFloat(7, 0, 999),
            'longitude' => fake()->optional()->randomFloat(7, 0, 999),
            'beds' => fake()->randomNumber(1),
            'baths' => fake()->randomNumber(1),
            'area' => fake()->numberBetween(1, 200), // Set a realistic range for the area
            'property_date' => fake()->date(),
            'price' => fake()->randomFloat(2, 0, 99999999),
            'status' => fake()->word,
            'type' => fake()->word,
            'deleted_at' => fake()->optional()->datetime(),
        ];
    }
}
