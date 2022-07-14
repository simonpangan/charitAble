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

            $table->string('name', 200);
            $table->text('about');
            $table->string('charity_email', 255);
            $table->string('logo', 150);

            $table->string('website_link', 150)->nullable();
            $table->string('facebook_link', 150)->nullable();
            $table->string('twitter_link', 150)->nullable();
            $table->string('instagram_link', 150)->nullable();

            $table->string('permits', 100)->nullable();
            $table->string('eth_address', 50)->nullable();
            $table->timestamp('charity_verified_at')->nullable();
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
