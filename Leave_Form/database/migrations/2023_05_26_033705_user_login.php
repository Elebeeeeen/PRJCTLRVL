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
        //DB for register

        Schema::create('user_login', function (Blueprint $table) {
            $table->id();
            $table->string('employee_number');
            $table->string('last_name');
            $table->string('middle_initial');
            $table->string('first_name');
            $table->string('email');
            $table->string('office');
            $table->integer('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
