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
            "description" => "تتكون من صالة ومجلس وثلاث غرف نوم ومطبخ وثلاث دورات مياه وتراس  مطل على الشارع بمساحة 138م",
            "images" => "[https://s3-alpha-sig.figma.com/img/31a0/e398/22928b9be4b7c44f58b26280c9af8237?Expires=1736121600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=JGGMfp3Xil59q8aSABbcKKkiDt7hbPj-1ZJfMpWdI0c06Rwt2g7aI4wHuKTI1-A923R80UAJPdJf9-YVT4maUXD9qJNK1gM2WaZL1l~VXbZX2OuZISQSf3n03NSs9HrFNXOzkTbwyVTXVgqmT3VN8fgzwUsTJS7pN0dp~alJhOLW78ioAprIUp6SOVKMVjy~2hQkZFFEzo1dnWlOvneuXSwqUy372Sadl86rIDORvXvJ-LQ1J5H6rtix5CcQvqtD07q~6B1FwUQQjcS~3MeqdT~TbJtUEnm5oAtaJdTLptr3TmRBKd4AyhEZvXrXdUkR2xr7fnUP0dKPywcxFv4RPw__]",
            "longitude" => 46.6721944,
            "latitude" => 24.7063333,
            "owner_id" => 1
        ]);
    }
}
