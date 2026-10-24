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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('email', 100)->unique();
            $table->string('name', 50);
            $table->string('lastName', 50);
            $table->string('username', 30);
            $table->string('password', 200);
            $table->date('date_of_birth');
            $table->char('tax_code', 16)->unique();
            $table->integer('age');
            $table->decimal('salary', 10, 2);
            $table->enum('gender', ['M', 'F']);
            $table->date('date_of_hire');
            $table->timestamps();
            $table->string('remember_token',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
