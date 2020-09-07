<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credito', function (Blueprint $table) {
            $table->increments('id_credito');      
            $table->double('monto');
            $table->integer('id_persona')->unsigned();
            $table->integer('id_destino')->unsigned();
            $table->integer('id_tipo_credito')->unsigned();
            $table->foreign('id_persona')->references('id_persona')->on('persona');
            $table->foreign('id_destino')->references('id_destino')->on('destino_credito');
            $table->foreign('id_tipo_credito')->references('id_tipo_credito')->on('tipo_credito');
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
        Schema::dropIfExists('credito');
    }
}
