<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Preferences;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Preferences>
 */
final class PreferencesFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Preferences::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\Client::factory(),
            'property_id' => \App\Models\Property::factory(),
        ];
    }
}
