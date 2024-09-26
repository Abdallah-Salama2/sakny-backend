<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Inquiry>
 */
final class InquiryFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Inquiry::class;

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
            'email' => fake()->safeEmail,
            'phone_number' => fake()->phoneNumber,
            'message' => fake()->optional()->text,
            'contact_type' => fake()->randomElement(['phone', 'text', 'email']),
            'inquiry_date' => fake()->datetime(),
        ];
    }
}
