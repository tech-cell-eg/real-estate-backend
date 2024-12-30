<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Company;
use App\Models\Inspector;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Property;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Property::factory(10)->create();
        Offer::factory(10)->create();
        Client::factory(10)->create();
        Company::factory(10)->create();
        Inspector::factory(10)->create();
        Order::factory(10)->create();
        $this->call(PropertySeeder::class);
    }
}
