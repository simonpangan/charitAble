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
        Schema::create('program_donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charity_program_id')->constrained()->onDelete('cascade');
            $table->foreignId('benefactor_id')->constrained('charity_programs');
            $table->text('amount');
            $table->timestamp('donated_at');
            $table->text('transaction_id');
            $table->text('blockchain_transaction')->nullable();
            $table->text('tip_price');
            $table->string('message')->nullable();
            $table->boolean('is_anonymous');
            $table->index(['charity_program_id', 'benefactor_id']);
            $table->index(['benefactor_id', 'charity_program_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_donations');
    }
};
