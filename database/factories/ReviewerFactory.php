<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviewer>
 */
class ReviewerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = City::factory()->create();
        return [
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'password' => 'password',
            'city_id' => $city->id,
            'review_fees' => fake()->randomFloat(2, 0, 1000),
            'national_id' => fake()->unique()->randomNumber(8),
            'certificate' => fake()->randomElement([UploadedFile::fake()->image('testImage1.jpg'), null]),
            'terms_accepted' => 1,
        ];
    }
}
