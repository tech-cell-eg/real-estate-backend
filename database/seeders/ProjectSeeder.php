<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Company;
use App\Models\Inspector;
use App\Models\Project;
use App\Models\Property;
use App\Models\Report;
use App\Models\Reviewer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 20; $i++) { 
            Project::create([
                'client_id' => Client::inRandomOrder()->first()->id,
                'property_id' => Property::inRandomOrder()->first()->id,
                'company_id' => Company::inRandomOrder()->first()->id,
                'inspector_id' => Inspector::inRandomOrder()->first()->id,
                'reviewer_id' => Reviewer::inRandomOrder()->first()->id,
                'report_id' => Report::inRandomOrder()->first()->id,
                'client-status' => fake()->randomElement(["accepted", "rejected", "pending"]),
                'company-status' => fake()->randomElement(["accepted", "rejected", "pending"]),
                'inspector-status' => fake()->randomElement(["accepted", "rejected", "pending"]),
                'price' => fake()->numerify('##0000'),
                'company-rate' => fake()->randomElement([1,2,3,4,5]),
                'inspector-rate' => fake()->randomElement([1,2,3,4,5]),
            ]);
        }
    }
}
