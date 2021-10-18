<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_requirements', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->references('id')->on('games')->nullable();
            $table->text('minimum')->nullable();
            $table->text('recommended')->nullable();
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
        Schema::dropIfExists('pc_requirements');
    }
}
