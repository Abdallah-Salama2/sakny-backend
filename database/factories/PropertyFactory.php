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
            // 'by_agent_id' => \App\Models\Agent::factory(),
            'city' => fake()->city,
            'state' => fake()->state,
            'address' => fake()->address,
            'latitude' => fake()->optional()->randomFloat(7, 0, 999),
            'longitude' => fake()->optional()->randomFloat(7, 0, 999),
            'title' => fake()->title,
            'description' => fake()->text,
            'image_url' => fake()->word,
            'property_date' => fake()->date(),
            'price' => fake()->randomFloat(2, 0, 99999999),
            'status' => fake()->word,
            'type' => fake()->word,
        ];
    }
}
