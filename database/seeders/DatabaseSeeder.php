<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Client;
use App\Models\Company;
use App\Models\File;
use App\Models\Inspector;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Property;
use App\Models\Report;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitiesAreasSeeder::class,
            CompanySeeder::class,
            InspectorSeeder::class,
            ReviewerSeeder::class,
            ClientSeeder::class,
            PropertySeeder::class,
            FileSeeder::class,
            WalletSeeder::class,
            TermSeeder::class,
            CardSeeder::class,
            ReportSeeder::class,
            ProjectSeeder::class,
            PaymentSeeder::class,
            ProjectCommentSeeder::class
        ]);
    }
}
