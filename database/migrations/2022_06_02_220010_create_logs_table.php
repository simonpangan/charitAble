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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->text('activity');
            $table->timestamp('created_at');

            // $table->index(['user_id', 'created_at']);

        });

        //postgres
        DB::statement('
            CREATE INDEX logs_user_id_created_at_index 
            on logs 
            (user_id ASC, created_at DESC)'
        );

        //mysql
        // DB::statement('ALTER TABLE logs 
        //     ADD INDEX logs_user_id_created_at_index 
        //     (user_id ASC, created_at DESC)'
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
