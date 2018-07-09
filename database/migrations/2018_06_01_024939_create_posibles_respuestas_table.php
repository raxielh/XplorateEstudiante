<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePosiblesRespuestasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posibles_respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('descripcion', 190);
            $table->integer('pregunta');
            $table->integer('orden');
            $table->integer('valor');
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
        Schema::drop('posibles_respuestas');
    }
}
