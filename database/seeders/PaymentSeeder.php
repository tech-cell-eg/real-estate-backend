<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Client;
use App\Models\Company;
use App\Models\Inspector;
use App\Models\Payment;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * every client pay to 6 times
     * every company pay to 9 times
     * every inspector got payed 6 times
     */
    public function run(): void
    {
        $clients = Client::all();
        foreach ($clients as $client) {
            for ($i=0; $i < 2; $i++) { 
                Payment::create([
                    'card_id' => Card::inRandomOrder()->first()->id,
                    'project_id' => Project::inRandomOrder()->first()->id,
                    'from_id' => $client->id,
                    'to_id' => Company::inRandomOrder()->first()->id,
                    'from_type' => 'client',
                    'to_type' => 'company',
                    'price' => fake()->numerify('##000')
                ]);
            }
        }

        $companys = Company::all();
        foreach ($companys as $company) {
            for ($i=1; $i <= 3; $i++) { 
                Payment::create([
                    'card_id' => Card::inRandomOrder()->first()->id,
                    'project_id' => Project::inRandomOrder()->first()->id,
                    'from_id' => $company->id,
                    'to_id' => $i,
                    'from_type' => 'company',
                    'to_type' => 'inspector',
                    'price' => fake()->numerify('##000')
                ]);
            }
        }
    }
}
