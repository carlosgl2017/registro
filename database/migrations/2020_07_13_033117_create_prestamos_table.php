<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id_prestamos');
            $table->double('cuota_mensual');
            $table->double('saldo')->nullable();
            $table->integer('id_persona')->unsigned();            
            $table->integer('id_entidad')->unsigned();            
            $table->foreign('id_persona')->references('id_persona')->on('persona');
            $table->foreign('id_entidad')->references('id_entidad')->on('entidad_financiera');
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
        Schema::dropIfExists('prestamos');
    }
}
