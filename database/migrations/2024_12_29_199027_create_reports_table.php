<?php

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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspector_id')->nullable()
            ->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('property_code');
            $table->timestamp('rating_date')->nullable();
            $table->text('property_description')->nullable();
            $table->text('property_address')->nullable();
            $table->string('contract_id');
            $table->timestamp('date')->nullable();
            $table->string('property_type');
            $table->string('infrastructure')->nullable();
            $table->string('services')->nullable();
            $table->integer('property_age')->nullable();
            $table->string('state')->nullable();
            $table->integer('number')->nullable();
            $table->integer('area_number')->nullable();
            $table->string('source')->nullable();
            $table->string('restriction_type')->nullable();
            $table->integer('distance')->nullable();
            $table->string('north_latitude')->nullable();
            $table->string('north_longitude')->nullable();
            $table->string('south_latitude')->nullable();
            $table->string('south_longitude')->nullable();
            $table->string('east_latitude')->nullable();
            $table->string('east_longitude')->nullable();
            $table->string('west_latitude')->nullable();
            $table->string('west_longitude')->nullable();
            $table->string('inside_area')->nullable();
            $table->string('attributed')->nullable();
            $table->string('building_state')->nullable();
            $table->text('finishing_description')->nullable();
            $table->integer('floor_number')->nullable();
            $table->string('land_evaluation')->nullable();
            $table->string('buildings_evaluation')->nullable();
            $table->decimal('property_total_cost', 15, 2)->nullable();
            $table->decimal('market_value', 15, 2)->nullable();
            $table->string('property_comparison')->nullable();
            $table->string('conflict')->nullable();
            $table->string('measurement')->nullable();
            $table->string('inspection')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
