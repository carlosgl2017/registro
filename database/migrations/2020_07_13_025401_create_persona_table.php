<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->string('nombre');
            $table->string('ap_paterno')->nullable();
            $table->string('ap_materno')->nullable();
            $table->string('celular');
            $table->string('direccion')->nullable();
            $table->string('lugar_residencia')->nullable();
            $table->string('ci');
            $table->date('fech_nac');
            $table->integer('id_nacionalidad');
            $table->integer('id_extension');
            $table->integer('id_estado_civil');
            $table->integer('id');
            $table->foreign('id_nacionalidad')->references('id_nacionalidad')->on('nacionalidad');
            $table->foreign('id_extension')->references('id_extension')->on('extension');
            $table->foreign('id_estado_civil')->references('id_estado_civil')->on('estado_civil');
            $table->foreign('id')->references('id')->on('users');
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
        Schema::dropIfExists('persona');
    }
}
