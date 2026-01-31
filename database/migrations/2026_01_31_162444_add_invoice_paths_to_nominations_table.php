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
        Schema::table('nominations', function (Blueprint $table) {
            $table->string('invoice_path')->nullable()->after('itr_invoice_no');
            $table->string('itr_invoice_path')->nullable()->after('invoice_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nominations', function (Blueprint $table) {
            $table->dropColumn(['invoice_path', 'itr_invoice_path']);
        });
    }
};
