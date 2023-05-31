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
        // database for employees leave form

        Schema::create('lf_employee', function (Blueprint $table) {
            $table->id();
            $table->string('office');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_initial');
            $table->string('employee_number');
            $table->string('position');
            $table->integer('salary');
            $table->string('email');
            $table->string('type_of_leave');
            $table->date('date');
            $table->integer('num_working_days');
            $table->string('inclusive_dates');
            $table->string('details');
            $table->string('specification');
            $table->string('commutation');
            $table->string('approver');
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
