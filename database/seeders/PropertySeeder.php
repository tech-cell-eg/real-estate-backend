<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 20; $i++) { 
            Property::create([
                "client_id" => Client::inRandomOrder()->first()->id,
                "address" => fake()->address(),
                "type" => "سكني",
                "city" => fake()->city(),
                "region" => "منطقة الرياض",
                "area" => fake()->numerify('###'),
                "description" => "شقة جديدة للتمليك بحي النرجس شارع السند شقق ألما تتكون من صالة ومجلس وثلاث غرف نوم ( منها وحده منها ماستر ) ومطبخ وثلاث دورات مياه وتراس  مطل على الشارع  بمساحة 138م مجهزة بأحدث التقنيات الذكية ومكيفة بالكامل مع مطبخ مجهز من فرن كهربائي  وشواية ومكرويف وغسالة صحون  في الدور الأول في عمارة سكنية فاخرة بواجهات عصرية وممرات رخامية ومواقف واسعة بمنطقة حيوية بالقرب من أهم المعالم الأساسية بمدينة الرياضالمميزات:تكييف كامل بأربع وحدات ذكية على نظام wife وسخانات مياهمطبخ جاهز مصمم بشكل عصري مجهز بكاونتر خدمة ومكان لغسيل الملابسقفل ذكي ونظام سمارت متكامل مهيئة بجميع وسائل السلامة ومزودة بنظام أمني عالياضاءة LED تعمل باللمستتمتع بالإضاءة الطبيعة من خلال النوافذ الواسعةمؤسسة بأحدث مواد البناء وتقنيات العزل المائي والحراري والأجباس المقاومة للحرائق والرطوبة موقف خاص واسع بجوار المدخل الرئيسياطلالة جنوبية على شارع هادئ بجوار منطقة سكنية مكتملة الخدماتتقع بالقرب من حديقة الحي وبجوار المسجد على بعد مئة متر مشيا على الاقدامتبعد الشقة مسافة 5 دقائق عن جامعة الامام محمد بن سعود الاسلامية وجامعة الأميرة نورة ومسافة 12 دقيقة عن مطار الملك خالدسداد فاتورة الكهرباء والمياه لمدة سنة من تاريخ الملكية صيانة مجانية للمساحات المشتركة لمدة سنة من تاريخ الملكية",
                "longitude" => fake()->longitude(),
                "latitude" => fake()->latitude(),
                'status' => fake()->randomElement(["accepted", "rejected", "pending"])
            ]);
        }
    }
}
