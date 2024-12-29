<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citiesAreas = config('CitiesAreas.cities and areas');

        foreach ($citiesAreas as $city => $areas) {
            $cityModel = \App\Models\City::create(['name' => $city]);

            foreach ($areas as $area) {
                $cityModel->areas()->create(['name' => $area]);
            }
        }
    }
}
