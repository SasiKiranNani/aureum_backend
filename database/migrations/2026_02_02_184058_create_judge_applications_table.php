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
        Schema::create('judge_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('present_designation');
            $table->integer('years_of_experience');
            $table->string('working_company_name');
            $table->text('address');
            $table->string('state');
            $table->string('country');
            $table->string('city');
            $table->string('postal');
            $table->string('phone');
            $table->string('email');
            $table->text('bio')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('profile_pic')->nullable();
            $table->json('documents')->nullable();
            $table->json('document_urls')->nullable();
            $table->string('linkedin')->nullable();
            $table->json('answers')->nullable();
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('judge_applications');
    }
};
