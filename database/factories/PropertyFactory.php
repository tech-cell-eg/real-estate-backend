<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "address" =>fake()->address(),
            "city" => fake()->city(),
            "region" =>fake()->city(),
            "images" => fake()->imageUrl(),
            "description" =>fake()->paragraph(),
            "area" => 118,
            "longitude" => 23.45,
            "latitude" => 45.34,
            "type" => fake()->randomElement(["سكني", "تجاري", "صناعي"]),
            "owner_id" => fake()->randomDigit()
        ];
    }
}
