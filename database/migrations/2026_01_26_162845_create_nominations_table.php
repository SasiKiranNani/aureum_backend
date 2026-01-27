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
        Schema::create('nominations', function (Blueprint $table) {
            $table->id();
            $table->string('application_id')->unique();
            
            // Foreign Keys
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('season_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('award_id')->constrained()->onDelete('cascade');
            
            // Nominee Details
            $table->enum('nominee_type', ['individual', 'organization', 'startup', 'research_group']);
            $table->string('full_name');
            $table->string('organization')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('industry');
            $table->text('address');
            $table->string('linkedin_url');
            $table->string('workforce_size')->nullable();
            $table->string('headshot')->nullable();
            
            // Contribution Details
            $table->string('contribution_title');
            $table->text('timeframe');
            $table->text('eligibility_justification');
            
            // Compliance Fields
            $table->enum('sensitive_data', ['yes', 'no'])->default('no');
            $table->enum('controversies', ['yes', 'no'])->default('no');
            $table->enum('industry_influence', ['yes', 'no'])->default('yes');
            
            // Declarations
            $table->boolean('declaration_accurate')->default(false);
            $table->boolean('declaration_privacy')->default(false);
            
            // Payment Information
            $table->enum('payment_status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->decimal('amount_paid', 10, 2)->nullable();
            $table->decimal('admin_fee', 10, 2)->default(35.00);
            $table->decimal('discount_applied', 10, 2)->default(0.00);
            
            $table->foreignId('payment_gateway_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nominations');
    }
};
