<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCascadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cascades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('nbrVoies');
            $table->float('altitudeMini');
            $table->float('hauteur');
            $table->string('nivDifficulté');
            $table->string('nivEngagement');
            $table->float('lng');
            $table->float('lat');
            $table->integer('id_orientation')->unsigned();
            $table->foreign('id_orientation')->references('id')->on('orientations');
            $table->integer('id_typeglace')->unsigned();
            $table->foreign('id_typeglace')->references('id')->on('typesglace');
            $table->integer('id_typefindevie')->unsigned();
            $table->foreign('id_typefindevie')->references('id')->on('typesfindevie');
            $table->integer('id_structure')->unsigned();
            $table->foreign('id_structure')->references('id')->on('structures');
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
        Schema::dropIfExists('cascades');
    }
}
