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
        Schema::create('volunteer_post_interests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charity_volunteer_post_id')->constrained()->onDelete('cascade');
            $table->foreignId('benefactor_id')->constrained();
            $table->string('message');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteer_post_interesteds');
    }
};
