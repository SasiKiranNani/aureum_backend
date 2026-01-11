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
        Schema::table('payment_gateways', function (Blueprint $table) {
            $table->dropColumn(['invoice_sequence', 'itr_invoice_sequence', 'client_id', 'salt']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_gateways', function (Blueprint $table) {
            $table->string('invoice_sequence')->nullable();
            $table->string('itr_invoice_sequence')->nullable();
            $table->text('client_id')->nullable();
            $table->text('salt')->nullable();
        });
    }
};
