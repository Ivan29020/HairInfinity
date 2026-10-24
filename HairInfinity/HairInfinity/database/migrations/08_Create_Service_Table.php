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
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id'); // Primary key with auto_increment
            $table->string('name', 50); // Mandatory name with a maximum of 50 characters
            $table->string('description', 300); // Mandatory description with a maximum of 300 characters
            $table->decimal('price', 10, 2)->nullable(); // Optional price as DECIMAL(10,2)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
