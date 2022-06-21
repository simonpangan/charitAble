<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charity_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charity_id')->constrained();
            $table->string('program_name');
            $table->string('program_description');
            $table->string('location')->nullable();
            $table->string('goal')->nullable();
            $table->string('total_donation_amount');
            $table->string('total_withdrawn_amount');
            $table->string('program_expenses')->nullable();
            $table->string('header');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charity_programs');
    }
};
