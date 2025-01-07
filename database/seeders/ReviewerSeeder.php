<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use App\Models\Reviewer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emails = ['reviewer1@gmail.com', 'reviewer2@gmail.com', 'reviewer3@gmail.com'];

        foreach ($emails as $email) {
            Reviewer::create([
                'username' => fake()->name(),
                'email' => $email,
                'phone' => fake()->phoneNumber(),
                'review_fees' => fake()->numerify('###'),
                'city_id' => City::inRandomOrder()->first()->id,
                'national_id' => fake()->numerify('########'),
                'password' => 'password',
                'certificate' => null,
                'terms_accepted' => 1,
                'company_id' => Company::inRandomOrder()->first()->id,
            ]);
        }
    }
}
