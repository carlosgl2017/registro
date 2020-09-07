<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bien', function (Blueprint $table) {
            $table->increments('id_bien');
            $table->string('descripcion');
            $table->string('marca')->nullable();
            $table->string('serie')->nullable();
            $table->double('valor');
            $table->integer('id_tipo_bien');
            $table->integer('id_persona');
            $table->foreign('id_persona')->references('id_persona')->on('persona');
            $table->foreign('id_tipo_bien')->references('id_tipo_bien')->on('tipo_bien');
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
        Schema::dropIfExists('bien');
    }
}
