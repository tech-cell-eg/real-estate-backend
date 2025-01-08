<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Inspector;
use App\Models\Reviewer;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    public function run(): void
    {
        $companyCount = count(Company::all()->toArray());
        for ($i=1; $i <= $companyCount; $i++) { 
            $company = Company::find($i);
            Wallet::create([
                'owner_id' => $company->id,
                'owner_type' => 'company',
                'current_balance' => fake()->numerify('##000'),
                'outstanding_balance' => fake()->numerify('#00')
            ]);
        }

        $inspectorCount = count(Inspector::all()->toArray());
        for ($i=1; $i <= $inspectorCount; $i++) { 
            $inspector = Inspector::find($i);
            Wallet::create([
                'owner_id' => $inspector->id,
                'owner_type' => 'inspector',
                'current_balance' => fake()->numerify('#000'),
                'outstanding_balance' => fake()->numerify('#00')
            ]);
        }

        $reviewers = Reviewer::all();
        foreach ($reviewers as $reviewer) {
            Wallet::create([
                'owner_id' => $reviewer->id,
                'owner_type' => 'reviewer',
                'current_balance' => fake()->numerify('#000'),
                'outstanding_balance' => fake()->numerify('#00')
            ]);
        }
    }
}
