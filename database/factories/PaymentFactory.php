<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\Client;
use App\Models\Company;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "price" => fake()->numerify("###000"),
            "card_id" => Card::inRandomOrder()->first()->id,
            "client_id" => Client::inRandomOrder()->first()->id,
            "company_id" => Company::inRandomOrder()->first()->id,
            "property_id" => Property::inRandomOrder()->first()->id,
            "paid" => fake()->randomElement([0, 1])
        ];
    }
}
