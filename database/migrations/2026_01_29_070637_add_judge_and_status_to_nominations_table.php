<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('nominations', function (Blueprint $table) {
            $table->foreignId('judge_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status')->default('pending'); // pending, processing, rejected, awarded, not_awarded
            $table->decimal('final_score', 5, 2)->nullable();
            $table->string('final_grade')->nullable(); // A, B, C, D
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nominations', function (Blueprint $table) {
            //
        });
    }
};
