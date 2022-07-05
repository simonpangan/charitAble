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
        Schema::create('charities', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users');
            $table->primary('id');

            $table->string('name');
            $table->text('about');
            $table->string('charity_email');
            $table->string('logo');

            $table->string('website_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();

            $table->string('permits')->nullable();
            $table->timestamp('charity_verified_at')->nullable();
            $table->string('eth_address')
            $table->integer('followers')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charities');
    }
};
