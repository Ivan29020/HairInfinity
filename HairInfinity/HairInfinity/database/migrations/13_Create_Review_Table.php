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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id'); // Primary key with auto_increment
            $table->integer('rating')->check('rating >= 1 AND rating <= 10'); // CHECK rating between 1 and 10
            $table->string('description', 500)->nullable();
            $table->unsignedBigInteger('appointment_id'); // Foreign key
            $table->timestamps();

            // Definition of the foreign key
            $table->foreign('appointment_id')->references('appointment_id')->on('appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
