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
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
             $table->string('name'); // Razorpay, PayPal, Stripe, PayU
            $table->boolean('is_active')->default(true);
            $table->string('mode')->default('sandbox'); // sandbox or production
            $table->string('currency')->default('USD');
            
            // Credentials
            $table->text('client_id')->nullable();
            $table->text('secret')->nullable();
            $table->text('key')->nullable();
            $table->text('salt')->nullable();
            $table->text('webhook_id')->nullable();
            
            // Settings
            $table->decimal('discount', 10, 2)->default(0);
            $table->boolean('has_invoice')->default(true);
            $table->string('invoice_sequence')->nullable();
            $table->boolean('has_itr_invoice')->default(false);
            $table->string('itr_invoice_sequence')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
