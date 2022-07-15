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
            $table->string('name', 50);
            $table->text('description');
            $table->string('location', 150);
            $table->json('goals');
            $table->bigInteger('total_withdrawn_amount')->default(0);
            $table->bigInteger('total_needed_amount')->default(0);
            $table->boolean('has_withdraw_request')->default(0);
            $table->bigInteger('withdraw_request_amount')->default(0);
            $table->timestamp('withdraw_requested_at')->nullable();
            $table->json('expenses');
            $table->string('header');
            $table->boolean('is_active')->default(1);
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
