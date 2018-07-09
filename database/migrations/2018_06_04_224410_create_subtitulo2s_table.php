<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubtitulo2sTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtitulo2s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsubtitulo2');
            $table->integer('pregunta');
            $table->char('variable', 100);
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
        Schema::drop('subtitulo2s');
    }
}
