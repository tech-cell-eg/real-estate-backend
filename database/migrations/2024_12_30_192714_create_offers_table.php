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
            $table->foreignId("client_id")->constrained();
            $table->foreignId("property_id")->constrained();
            $table->foreignId("company_id")->constrained();
            $table->foreignId("inspector_id")->constrained()->nullable();
            $table->enum("status", ["accepted", "rejected", "pending"])->default("pending");
            $table->text("file_path");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
