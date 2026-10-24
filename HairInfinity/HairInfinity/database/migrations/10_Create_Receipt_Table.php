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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id('receipt_id'); // Primary key with auto_increment
            $table->date('issue_date'); // Mandatory issue date
            $table->decimal('total', 10, 2); // Total as DECIMAL(10,2)
            $table->unsignedBigInteger('payment_method_id')->nullable(); // 'type' field (nullable if not always required)
            $table->timestamps();

            // Foreign key definition
            $table->foreign('payment_method_id')->references('payment_method_id')->on('payment_methods')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
