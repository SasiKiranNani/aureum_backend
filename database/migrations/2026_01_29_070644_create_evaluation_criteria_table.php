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
        Schema::create('evaluation_criteria', function (Blueprint $table) {
            $table->id();
            $table->integer('phase'); // 1 to 6
            $table->string('grade_letter'); // A, B, C, D
            $table->string('label');
            $table->text('description')->nullable();
            $table->integer('min_score')->nullable();
            $table->integer('max_score')->nullable();
            $table->boolean('is_rejection')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_criteria');
    }
};
