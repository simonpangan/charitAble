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
            $table->string('name' , 100);
            $table->text('description');
            $table->string('location', 70)->nullable();
            $table->text('qualifications');
            $table->text('incentives')->nullable();
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
