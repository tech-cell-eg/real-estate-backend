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
        Schema::create('reviewers', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phone');
            $table->decimal('review_fees', 8, 2);
            $table->string('national_id')->unique();
            $table->foreignIdFor(City::class)->constrained()->cascadeOnDelete();
            $table->string('password');
            $table->string('certificate')->nullable();
            $table->boolean('terms_accepted')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewers');
    }
};
