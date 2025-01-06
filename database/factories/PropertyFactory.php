<?php

namespace Database\Factories;

use App\Models\Client;
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
            "description" =>fake()->paragraph(),
            "area" => 118,
            "longitude" => 23.45,
            "latitude" => 45.34,
            // "price" => ceil(rand(10,500)),
            "type" => fake()->randomElement(["سكني", "تجاري", "صناعي"]),
            "client_id" => Client::inRandomOrder()->first()->id,
            "status" => fake()->randomElement(["pending", "accepted", "rejected"])
        ];
    }
}
