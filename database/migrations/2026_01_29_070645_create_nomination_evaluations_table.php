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
        Schema::create('nomination_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nomination_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // The Judge

            // Phase 1 (Only Grade)
            $table->string('phase_1_grade')->nullable();

            // Phase 2
            $table->string('phase_2_grade')->nullable();
            $table->integer('phase_2_score')->nullable();

            // Phase 3
            $table->string('phase_3_grade')->nullable();
            $table->integer('phase_3_score')->nullable();

            // Phase 4
            $table->string('phase_4_grade')->nullable();
            $table->integer('phase_4_score')->nullable();

            // Phase 5
            $table->string('phase_5_grade')->nullable();
            $table->integer('phase_5_score')->nullable();

            // Phase 6
            $table->string('phase_6_grade')->nullable();
            $table->integer('phase_6_score')->nullable();

            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomination_evaluations');
    }
};
