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
        Schema::create('charity_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charity_id')->constrained();
            $table->bigInteger('charity_programs_id')->nullable()->constrained('charity_programs');
            $table->text('main_content_body');
            $table->string('main_content_body_image', 70)->nullable();
            $table->timestamps();

            // $table->index(['charity_id', 'created_at']);
        });

        DB::statement('
            CREATE INDEX charity_posts_charity_id_created_at_index
            on charity_posts
            (charity_id ASC, created_at DESC)'
    )   ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charity_posts');
    }
};
