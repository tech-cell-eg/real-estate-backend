<?php

namespace Database\Factories;

use App\Models\Inspector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'inspector_id' => Inspector::inRandomOrder()->first()->id,
            'property_code' => $this->faker->unique()->bothify('P###'),
            'rating_date' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
            'property_description' => $this->faker->optional()->paragraph(),
            'property_address' => $this->faker->optional()->address(),
            'contract_id' => $this->faker->numerify('C###'),
            'date' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
            'property_type' => $this->faker->randomElement(['Residential', 'Commercial', 'Industrial']),
            'infrastructure' => $this->faker->optional()->word(),
            'services' => $this->faker->optional()->word(),
            'property_age' => $this->faker->optional()->numberBetween(1, 50),
            'state' => $this->faker->optional()->randomElement(['ready', 'under construction', 'needs renovation']),
            'number' => $this->faker->optional()->randomDigitNotNull(),
            'area_number' => $this->faker->optional()->randomDigitNotNull(),
            'source' => $this->faker->optional()->word(),
            'restriction_type' => $this->faker->optional()->word(),
            'distance' => $this->faker->optional()->numberBetween(1, 500),
            'north_latitude' => $this->faker->optional()->latitude(),
            'north_longitude' => $this->faker->optional()->longitude(),
            'south_latitude' => $this->faker->optional()->latitude(),
            'south_longitude' => $this->faker->optional()->longitude(),
            'east_latitude' => $this->faker->optional()->latitude(),
            'east_longitude' => $this->faker->optional()->longitude(),
            'west_latitude' => $this->faker->optional()->latitude(),
            'west_longitude' => $this->faker->optional()->longitude(),
            'inside_area' => $this->faker->optional()->randomElement(['Yes', 'No']),
            'attributed' => $this->faker->optional()->word(),
            'building_state' => $this->faker->optional()->randomElement(['Good', 'Average', 'Poor']),
            'finishing_description' => $this->faker->optional()->paragraph(),
            'floor_number' => $this->faker->optional()->numberBetween(1, 20),
            'land_evaluation' => $this->faker->optional()->randomElement(['Good', 'Average', 'Poor']),
            'buildings_evaluation' => $this->faker->optional()->randomElement(['Good', 'Average', 'Poor']),
            'property_total_cost' => $this->faker->optional()->randomFloat(2, 1000, 1000000),
            'market_value' => $this->faker->optional()->randomFloat(2, 1000, 1000000),
            'property_comparison' => $this->faker->optional()->word(),
            'conflict' => $this->faker->optional()->randomElement(['None', 'Legal', 'Financial']),
            'measurement' => $this->faker->optional()->word(),
            'inspection' => $this->faker->optional()->word(),
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}
