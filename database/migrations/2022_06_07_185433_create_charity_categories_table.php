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
        Schema::create('categories', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
        });

        Schema::create('charity_categories', function (Blueprint $table) {
            $table->unsignedTinyInteger('category_id');
          
            $table->foreignId('charity_id')->constrained();
            $table->foreign('category_id')->references('id')->on('categories');
     
            $table->primary(['category_id', 'charity_id']);
            $table->index(['charity_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charity_categories');
    }
};
