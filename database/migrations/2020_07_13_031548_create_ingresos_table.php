<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id_ingresos');
            $table->double('ingreso_mensual');
            $table->integer('tiempo_trabajo_meses')->nullable();
            $table->integer('tiempo_trabajo_anios')->nullable();
            $table->boolean('aporte_afp')->nullable();
            $table->integer('id_persona')->unsigned();
            $table->integer('id_tipoingreso')->unsigned();
            $table->integer('id_tiposalario')->nullable();
            $table->foreign('id_persona')->references('id_persona')->on('persona');
            $table->foreign('id_tipoingreso')->references('id_tipoingreso')->on('tipo_ingreso');
            $table->foreign('id_tiposalario')->references('id_tiposalario')->on('tipo_salario');
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
        Schema::dropIfExists('ingresos');
    }
}
