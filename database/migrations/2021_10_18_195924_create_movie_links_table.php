<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_links', function (Blueprint $table) {
            $table->id();
            $table->integer('movie_id')->references('id')->on('movies')->nullable();
            $table->string('format')->nullable(); // mp4 or webm
            $table->string('quality_480')->nullable();
            $table->string('quality_max')->nullable();
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
        Schema::dropIfExists('movie_links');
    }
}
