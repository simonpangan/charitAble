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
        Schema::create('benefactors', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users');
            $table->primary('id');

            $table->text('first_name');
            $table->text('last_name');
            $table->string('gender');
            $table->smallInteger('age');
            $table->string('address');
            $table->string('city');
            $table->string('preferences');
            $table->text('total_donation');
            $table->text('total_charities_donated');
            $table->text('total_charities_followed');
            $table->text('total_number_donations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefactors');
    }
};
