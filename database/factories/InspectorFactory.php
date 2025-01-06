<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inspector>
 */
class InspectorFactory extends Factory
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
            'inspection_fees' => fake()->randomFloat(2, 0, 1000),
            'national_id' => fake()->unique()->randomNumber(8),
            'area_id_1' => Area::factory()->create([
                'city_id' => $city->id,
            ]),
            'area_id_2' => Area::factory()->create([
                'city_id' => $city->id,
            ]),
            'area_id_3' => Area::factory()->create([
                'city_id' => $city->id,
            ]),
            'certificate' => fake()->randomElement([UploadedFile::fake()->image('testImage1.jpg'), null]),
            'terms_accepted' => 1,
        ];
    }
}
