<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citiesAreas = json_decode(file_get_contents(database_path('seeders/CitiesAreas.json')), true);
        foreach ($citiesAreas as $city => $areas) {
            $cityModel = City::create(['name' => $city]);
            foreach ($areas as $area) {
                $cityModel->areas()->create(['name' => $area]);
            }
        }
    }
}
