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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail_img')->nullable();
            $table->string('title');
            $table->date('event_date');
            $table->date('booking_start_date');
            $table->date('booking_deadline_date');
            $table->text('description')->nullable();
            $table->decimal('ticket_price', 10, 2)->default(0);
            $table->json('images')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
