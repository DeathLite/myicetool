<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tel');
            $table->boolean('newsletter');
            $table->boolean('alerte');
            $table->integer('id_niveau')->unsigned();
            $table->foreign('id_niveau')->references('id')->on('niveaux');
            $table->integer('id_zone')->unsigned();
            $table->foreign('id_zone')->references('id')->on('zones');
            $table->integer('id_langue')->unsigned();
            $table->foreign('id_langue')->references('id')->on('langues');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
