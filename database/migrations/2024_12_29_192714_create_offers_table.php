<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string("price");
            $table->foreignId("property_id")->constrained();
            // i will replace it with company id later
            $table->string("companyName");
            // i will make it foreign key later
            $table->bigInteger("inspectorId")->default(1);
            $table->enum("state", ["accepted", "rejected", "pending"])->default("pending");
            $table->string("file");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
