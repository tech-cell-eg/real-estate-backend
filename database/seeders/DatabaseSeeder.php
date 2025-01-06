<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Client;
use App\Models\Company;
use App\Models\File;
use App\Models\Inspector;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Project;
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
        $this->call([
            ClientSeeder::class,
            TermSeeder::class
        ]);
        // Client::factory(2)->create();
        Property::factory(10)->create();
        File::factory(20)->create();
        Company::factory(10)->create();
        Project::factory(20)->create();
        // Inspector::factory(10)->create();
        // Offer::factory(10)->create();
        // Order::factory(10)->create();
        // Card::factory(10)->create();
        // Payment::factory(10)->create();
        // $this->call([
        //     PropertySeeder::class,
        //     TermSeeder::class
        // ]);
    }
}
