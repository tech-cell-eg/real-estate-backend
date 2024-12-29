<?php

use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inspectors', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phone');
            $table->decimal('inspection_fees', 8, 2);
            $table->string('national_id')->unique();
            $table->foreignIdFor(City::class)->constrained()->cascadeOnDelete();
            $table->foreignId('area_id_1')->constrained('areas')->cascadeOnDelete();
            $table->foreignId('area_id_2')->constrained('areas')->cascadeOnDelete();
            $table->foreignId('area_id_3')->constrained('areas')->cascadeOnDelete();
            $table->string('password');
            $table->string('delegation')->nullable();
            $table->boolean('terms_accepted')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspectors');
    }
};
