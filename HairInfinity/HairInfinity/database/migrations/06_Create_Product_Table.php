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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id'); // Primary key with auto_increment
            $table->string('name', 100); // Mandatory name with a maximum of 100 characters
            $table->decimal('price', 10, 2); // Mandatory price as a DECIMAL(10,2)
            $table->string('description', 300); // Mandatory description with a maximum of 300 characters
            // Column for foreign key
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();

            // Foreign key definition
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
