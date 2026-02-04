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
        Schema::table('nomination_evaluations', function (Blueprint $table) {
            $table->decimal('phase_2_score', 5, 2)->nullable()->change();
            $table->decimal('phase_3_score', 5, 2)->nullable()->change();
            $table->decimal('phase_4_score', 5, 2)->nullable()->change();
            $table->decimal('phase_5_score', 5, 2)->nullable()->change();
            $table->decimal('phase_6_score', 5, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nomination_evaluations', function (Blueprint $table) {
            $table->integer('phase_2_score')->nullable()->change();
            $table->integer('phase_3_score')->nullable()->change();
            $table->integer('phase_4_score')->nullable()->change();
            $table->integer('phase_5_score')->nullable()->change();
            $table->integer('phase_6_score')->nullable()->change();
        });
    }
};
