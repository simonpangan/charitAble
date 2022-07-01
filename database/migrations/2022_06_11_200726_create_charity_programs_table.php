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
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->json('goal');
            $table->integer('total_donors')->default(0);
            $table->bigInteger('total_donation_amount')->default(0);
            $table->bigInteger('total_withdrawn_amount')->default(0);
            $table->bigInteger('total_needed_amount')->default(0);
            $table->json('expenses');
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
