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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('supplier_id'); // Primary key with auto_increment
            $table->string('name', 50); // Mandatory name with a maximum of 50 characters
            $table->string('email', 50)->unique(); // Mandatory email with a maximum of 50 characters
            $table->string('phone',20); // Mandatory phone number
            $table->string('address', 300); // Mandatory address with a maximum of 300 characters
            $table->enum('contract_status', ['Active', 'Suspended']); // Mandatory contract status
            $table->decimal('rating', 3, 1); // Mandatory rating as DECIMAL(3,1)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
