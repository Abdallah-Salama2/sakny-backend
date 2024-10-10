<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PropertyImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\PropertyImage>
 */
final class PropertyImageFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = PropertyImage::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'filename' => fake()->word,
            'property_id' => \App\Models\Property::factory(),
        ];
    }
}
