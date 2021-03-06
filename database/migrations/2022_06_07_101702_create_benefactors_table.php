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
            $table->string('gender', 10);
            $table->date('birth_date');
            $table->string('preferences', 50);
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
