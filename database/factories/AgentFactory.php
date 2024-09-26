<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Agent;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Agent>
 */
final class AgentFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Agent::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'email' => fake()->safeEmail,
            'phone' => fake()->phoneNumber,
            'password' => bcrypt(fake()->password),
            'remember_token' => Str::random(10),
        ];
    }
}
