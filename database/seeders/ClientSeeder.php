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
        Client::create([
            'username' => 'abdo',
            'email' => 'a@a.a',
            'phone' => fake()->phoneNumber(),
            'city_id' => City::factory()->create()->id,
            'password' => 'password',
            'type' => fake()->randomElement(['individual', 'company']),
            'delegation' => fake()->randomElement([HttpUploadedFile::fake()->image('testImage1.jpg'), null]),
            'terms_accepted' => 1,
        ]);
    }
}
