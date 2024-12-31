<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            "address" => "عقار في شارع السند ، حي النرجس ، الرياض ، منطقة الرياض",
            "type" => "سكني",
            "city" => "الرياض",
            "region" => "منطقة الرياض",
            "area" => 138,
            "price" => 18000,
            "description" => "تتكون من صالة ومجلس وثلاث غرف نوم ومطبخ وثلاث دورات مياه وتراس  مطل على الشارع بمساحة 138م",
            "longitude" => 46.6721944,
            "latitude" => 24.7063333,
            "owner_id" => 1
        ]);
    }
}
