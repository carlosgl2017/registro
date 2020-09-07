<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConyuguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conyugues', function (Blueprint $table) {
            $table->increments('id_conyugues');
            $table->integer('conyugue');
            $table->integer('id_persona')->unsigned();
            $table->foreign('id_persona')->references('id_persona')->on('persona');
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
        Schema::dropIfExists('conyugues');
    }
}
