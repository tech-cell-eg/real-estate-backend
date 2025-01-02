<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Company;
use App\Models\Inspector;
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
            "file_path" => "uploads/" . fake()->word() . '.pdf',
            "price" => fake()->numerify("###000"),
            "client_id" => Client::inRandomOrder()->first()->id,
            "company_id" => Company::inRandomOrder()->first()->id,
            "inspector_id" => Inspector::inRandomOrder()->first()->id,
            "property_id" => Property::inRandomOrder()->first()->id,
            "status" => fake()->randomElement(["accepted", "rejected", "pending"])
        ];
    }
}
