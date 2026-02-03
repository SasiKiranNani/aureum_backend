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
        Schema::create('dummy_judges', function (Blueprint $table) {
            $table->id();
            $table->string('judge_name');
            $table->string('designation');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('country');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dummy_judges');
    }
};
