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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id('warehouse_id'); // Primary key with auto_increment
            $table->string('name', 50); // Name with a maximum of 50 characters
            $table->string('description', 300); // Description with a maximum of 300 characters
            $table->string('address', 300); // Address with a maximum of 300 characters
            $table->integer('capacity'); // Capacity as an integer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
