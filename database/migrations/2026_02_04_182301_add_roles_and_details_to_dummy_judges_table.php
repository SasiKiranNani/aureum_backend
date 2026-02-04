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
        Schema::table('dummy_judges', function (Blueprint $table) {
            $table->boolean('is_judge')->default(false);
            $table->boolean('is_panel_member')->default(false);
            $table->boolean('has_details_page')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dummy_judges', function (Blueprint $table) {
            $table->dropColumn(['is_judge', 'is_panel_member', 'has_details_page']);
        });
    }
};
