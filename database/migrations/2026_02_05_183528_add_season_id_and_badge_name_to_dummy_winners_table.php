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
        Schema::table('dummy_winners', function (Blueprint $table) {
            $table->foreignId('season_id')->nullable()->constrained('seasons')->onDelete('set null')->after('is_active');
            $table->string('badge_name')->nullable()->after('badge_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dummy_winners', function (Blueprint $table) {
            $table->dropForeign(['season_id']);
            $table->dropColumn(['season_id', 'badge_name']);
        });
    }
};
