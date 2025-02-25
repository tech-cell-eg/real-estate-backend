<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Client;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile as HttpUploadedFile;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'name' => 'abdo',
                "email" => 'a@a.a'
            ],
            [
                'name' => 'mostafa',
                "email" => 'm@m.m'
            ],
            [
                'name' => 'shahinda',
                "email" => 's@s.s'
            ],
        ];

        foreach ($data as $d) {
            Client::create([
                'username' => $d['name'],
                'email' => $d['email'],
                'phone' => fake()->phoneNumber(),
                'city_id' => City::inRandomOrder()->first()->id,
                'password' => 'password',
                'type' => fake()->randomElement(['individual', 'company']),
                'delegation' => null,
                'terms_accepted' => 1,
            ]);
        }
    }
}
