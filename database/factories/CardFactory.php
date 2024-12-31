<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
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
            "name_on_card" => fake()->name(),
            "card_number" => fake()->numerify('#### #### #### ####'),
            "expiration_date" => fake()->date("m/y"),
            "CVC" => fake()->numerify("###")
        ];
    }
}
