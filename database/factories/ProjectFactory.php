<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Company;
use App\Models\Inspector;
use App\Models\Property;
use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "client_id" => Client::inRandomOrder()->first()->id,
            "inspector_id" => Inspector::inRandomOrder()->first()->id,
            "company_id" => Company::inRandomOrder()->first()->id,
            "property_id" => Property::inRandomOrder()->first()->id,
            "report_id" => Report::inRandomOrder()->first()->id,
            "company-status" => fake()->randomElement(["accepted", "rejected", "pending"]),
            "client-status" => fake()->randomElement(["accepted", "rejected", "pending"]),
            "inspector-status" => fake()->randomElement(["accepted", "rejected", "pending"]),
            "price" => fake()->numerify("##000")
        ];
    }
}
