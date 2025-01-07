<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'شركة عقاركم',
                "email" => 'company1@gmail.com'
            ],
            [
                'name' => 'شركة المتحدة',
                "email" => 'company2@gmail.com'
            ],
            [
                'name' => 'شركة المتميز',
                "email" => 'company3@gmail.com'
            ],
        ];

        foreach ($data as $d) {
            Company::create([
                'username' => $d['name'],
                'email' => $d['email'],
                'phone' => fake()->phoneNumber(),
                'city_id' => City::inRandomOrder()->first()->id,
                'password' => 'password',
                'tax_number' => fake()->numerify('####'),
                'delegation' => null,
                'terms_accepted' => 1,
            ]);
        }

    }
}
