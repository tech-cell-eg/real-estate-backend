<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 20; $i++) { 
            $r = round(rand(1,6));
            File::create([
                'property_id' => $i,
                'path' => "/default/images/property-front/$r.svg",
                'url' => config('app.url') . "/default/images/property-front/$r.svg",
            ]);
            File::create([
                'property_id' => $i,
                'path' => "/default/images/property-rooms/1.svg",
                'url' => config('app.url') . "/default/images/property-rooms/1.svg",
            ]);
            File::create([
                'property_id' => $i,
                'path' => "/default/images/property-rooms/2.svg",
                'url' => config('app.url') . "/default/images/property-rooms/2.svg",
            ]);
            File::create([
                'property_id' => $i,
                'path' => "/default/images/property-rooms/3.svg",
                'url' => config('app.url') . "/default/images/property-rooms/3.svg",
            ]);
            File::create([
                'property_id' => $i,
                'path' => "/default/images/property-rooms/4.svg",
                'url' => config('app.url') . "/default/images/property-rooms/4.svg",
            ]);
        }
    }
}
