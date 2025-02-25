<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        Storage::fake('local');
        return [
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'city_id' => City::factory()->create()->id,
            'password' => 'password',
            'tax_number' => fake()->unique()->numberBetween(0, 1000),
            'delegation' => fake()->randomElement([UploadedFile::fake()->image('testImage1.jpg'), null]),
            'terms_accepted' => 1,
        ];
    }
}
