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
            $table->bigInteger("owner_id")->nullable();
            $table->text("address");
            $table->enum("type", ["سكني", "تجاري", "صناعي"]);
            $table->float("area");
            $table->string("city");
            $table->string("region");
            $table->text("images");
            $table->text("description");
            $table->integer("longitude");
            $table->integer("latitude");
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
