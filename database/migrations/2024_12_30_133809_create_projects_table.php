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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client_id")->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("property_id")->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("company_id")->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("inspector_id")->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("reviewer_id")->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("report_id")->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum("client-status", ["accepted", "rejected", "pending"])->default("pending");
            $table->enum("company-status", ["accepted", "rejected", "pending"])->default("accepted");
            $table->enum("inspector-status", ["accepted", "rejected", "pending"])->default("pending");
            $table->enum("reviewer-status", ["accepted", "rejected", "pending"])->default("pending");
            $table->decimal('price', 10, 2);
            $table->enum("company-rate", [1,2,3,4,5])->nullable();
            $table->enum("inspector-rate", [1,2,3,4,5])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
