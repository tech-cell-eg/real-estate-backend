<?php

use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(City::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
        });
        $citiesAreas = json_decode(file_get_contents(database_path('seeders/CitiesAreas.json')), true);
        foreach ($citiesAreas as $city => $areas) {
            $city = City::where('name', $city)->first();
            foreach ($areas as $area) {
                $city->areas()->create(['name' => $area]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
