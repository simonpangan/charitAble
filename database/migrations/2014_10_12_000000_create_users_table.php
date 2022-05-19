<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            /*

        'firstName',
        'lastName',
        'age',
        'city',
        'accountType',
        'email',
        'password',
        'preferences',
        'isSetupCompleted'

        */
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->integer('age')->nullable();
            $table->string('city')->nullable();
            $table->string('accountType')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('preferences')->nullable();
            $table->integer('isSetupCompleted')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
};
