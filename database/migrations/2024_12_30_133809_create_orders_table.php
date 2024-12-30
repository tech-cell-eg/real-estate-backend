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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client_id")->constrained()->nullable();
            $table->foreignId("property_id")->constrained()->nullable();
            $table->foreignId("company_id")->constrained()->nullable();
            $table->foreignId("inspector_id")->constrained()->nullable();
            $table->enum("status", ["accepted", "rejected", "pending"])
            ->default("pending");
            $table->enum("companyRate", [1,2,3,4,5])->nullable();
            $table->enum("inspectorsRate", [1,2,3,4,5])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
