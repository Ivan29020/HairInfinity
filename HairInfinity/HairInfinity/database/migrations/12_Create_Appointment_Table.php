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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id'); // Primary key with auto_increment
            $table->date('date'); // Mandatory date
            $table->time('time'); // Mandatory time
            $table->string('description', 100); // Mandatory description

            // Columns for foreign keys
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('hall_id')->nullable();
            $table->unsignedBigInteger('receipt_id')->nullable();
            $table->timestamps();
            

            // Definition of foreign keys
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->foreign('hall_id')->references('hall_id')->on('halls');
            $table->foreign('receipt_id')->references('receipt_id')->on('receipts');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
