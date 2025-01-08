<?php

namespace Database\Seeders;

use App\Models\Inspector;
use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 20; $i++) { 
            Report::create([
                'inspector_id' => Inspector::inRandomOrder()->first()->id,
                'property_code' => fake()->unique()->bothify('P###'),
                'rating_date' => fake()->dateTimeBetween('-1 year', 'now'),
                'property_description' => fake()->paragraph(),
                'property_address' => fake()->address(),
                'contract_id' => fake()->numerify('C###'),
                'date' => fake()->dateTimeBetween('-1 year', 'now'),
                'property_type' => fake()->randomElement(['Residential', 'Commercial', 'Industrial']),
                'infrastructure' => fake()->word(),
                'services' => fake()->word(),
                'property_age' => fake()->numberBetween(1, 50),
                'state' => fake()->randomElement(['ready', 'under construction', 'needs renovation']),
                'number' => fake()->randomDigitNotNull(),
                'area_number' => fake()->randomDigitNotNull(),
                'source' => fake()->word(),
                'restriction_type' => fake()->word(),
                'distance' => fake()->numberBetween(1, 500),
                'north_latitude' => fake()->latitude(),
                'north_longitude' => fake()->longitude(),
                'south_latitude' => fake()->latitude(),
                'south_longitude' => fake()->longitude(),
                'east_latitude' => fake()->latitude(),
                'east_longitude' => fake()->longitude(),
                'west_latitude' => fake()->latitude(),
                'west_longitude' => fake()->longitude(),
                'inside_area' => fake()->randomElement(['Yes', 'No']),
                'attributed' => fake()->word(),
                'building_state' => fake()->randomElement(['Good', 'Average', 'Poor']),
                'finishing_description' => fake()->paragraph(),
                'floor_number' => fake()->numberBetween(1, 20),
                'land_evaluation' => fake()->randomElement(['Good', 'Average', 'Poor']),
                'buildings_evaluation' => fake()->randomElement(['Good', 'Average', 'Poor']),
                'property_total_cost' => fake()->randomFloat(2, 1000, 1000000),
                'market_value' => fake()->randomFloat(2, 1000, 1000000),
                'property_comparison' => fake()->word(),
                'conflict' => fake()->randomElement(['None', 'Legal', 'Financial']),
                'measurement' => fake()->word(),
                'inspection' => fake()->word(),
                'notes' => fake()->paragraph(),
            ]);
        }
    }
}
