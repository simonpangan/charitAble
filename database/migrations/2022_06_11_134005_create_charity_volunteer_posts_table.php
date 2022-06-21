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
        Schema::create('charity_volunteer_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charity_id')->constrained();
            $table->string('volunteer_work_name')->nullable();
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('image')->nullable();
            $table->string('incentives')->nullable();
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
        Schema::dropIfExists('charity_volunteer_posts');
    }
};
