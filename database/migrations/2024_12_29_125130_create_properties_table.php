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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client_id")->nullable()->constrained('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text("address");
            $table->enum("type", ["سكني", "تجاري", "صناعي"]);
            $table->enum("status", ["pending", "accepted", "rejected"])->default('pending');
            $table->float("area");
            $table->string("city");
            $table->string("region");
            $table->text("description");
            $table->float("longitude");
            $table->float("latitude");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
