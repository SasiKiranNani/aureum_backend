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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique();
            $table->foreignId('payment_gateway_id')->constrained()->onDelete('cascade');
            $table->foreignId('nomination_id')->nullable()->constrained()->onDelete('cascade');
            $table->decimal('amount_usd', 15, 2);
            $table->decimal('amount_inr', 15, 2);
            $table->string('status')->default('pending'); // pending, completed, failed, refunded
            $table->json('payer_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
