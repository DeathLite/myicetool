<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCascadeZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cascade_zone', function (Blueprint $table) {
          $table->integer('cascade_id')->unsigned();
          $table->foreign('cascade_id')->references('id')->on('cascades');

          $table->integer('zone_id')->unsigned();
          $table->foreign('zone_id')->references('id')->on('zones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cascade_zone');
    }
}
