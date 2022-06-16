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
        Schema::create('charity_followers', function (Blueprint $table) {
            $table->foreignId('charity_id')->constrained();
            $table->foreignId('benefactor_id')->constrained();
     
            $table->primary(['charity_id', 'benefactor_id']);
            $table->index(['benefactor_id', 'charity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charity_followers');
    }
};
