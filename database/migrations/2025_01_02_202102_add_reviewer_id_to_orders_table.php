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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('reviewer_id')->nullable()->constrained('review_id')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('reviewers', function (Blueprint $table) {
                $table->dropForeign(['reviewer_id']);
                $table->dropColumn('reviewer_id');
            });
    }
};
