<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * every client has 3 cards
     */
    public function run(): void
    {
        $clients = Client::all();

        foreach ($clients as $client) {
            for ($i=0; $i < 3; $i++) { 
                Card::create([
                    "client_id" => $client->id,
                    "name_on_card" => fake()->name(),
                    "card_number" => fake()->numerify('#### #### #### ####'),
                    "expiration_date" => fake()->date("m/y"),
                    "CVC" => fake()->numerify("###")
                ]);
            }
        }
    }
}
