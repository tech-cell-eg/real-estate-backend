<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\City;
use App\Models\Company;
use App\Models\Inspector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InspectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                "name" => 'محمد احمد',
                "email" => 'inspector1@gmail.com'
            ],
            [
                "name" => 'وليد شعبان',
                "email" => 'inspector2@gmail.com'
            ],
            [
                "name" => 'احمد علي',
                "email" => 'inspector3@gmail.com'
            ],
        ];
        
        foreach ($data as $d) {
            Inspector::create([
                'username' => $d["name"],
                'email' => $d['email'],
                'phone' => fake()->phoneNumber(),
                'password' => 'password',
                'city_id' => 1,
                'inspection_fees' => fake()->randomFloat(2, 0, 1000),
                'national_id' => fake()->unique()->randomNumber(8),
                'area_id_1' => Area::inRandomOrder()->first()->id,
                'area_id_2' => Area::inRandomOrder()->first()->id,
                'area_id_3' => Area::inRandomOrder()->first()->id,
                'certificate' => null,
                'terms_accepted' => 1,
                'company_id' => Company::inRandomOrder()->first()->id,
            ]);
        }
    }
}
