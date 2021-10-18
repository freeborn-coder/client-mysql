<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_subs', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id')->references('package_number')->on('packages')->nullable();
            $table->integer('package_group_id')->references('id')->on('package_groups')->nullable();
            $table->decimal('price_in_cents_with_discount',10,2)->nullable();
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
        Schema::dropIfExists('package_subs');
    }
}
