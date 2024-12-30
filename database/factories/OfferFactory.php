<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "file" => fake()->word() . '.pdf',
            "price" => rand(10,1000),
            "companyName" => fake()->company(),
            "inspectorId" => fake()->randomDigit(),
            "property_id" => Property::inRandomOrder()->first()->id,
            "state" => fake()->randomElement(["accepted", "rejected", "pending"])
        ];
    }
}
