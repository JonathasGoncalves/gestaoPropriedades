<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEventoAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventoAgenda', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->time('hora');
            $table->unsignedInteger('tecnico_id');
            $table->unsignedInteger('fomulario_id');
            $table->integer('tanque_id');
            $table->unsignedInteger('submissao_id');
            $table->timestamps();

            $table->foreign('fomulario_id')->references('id')->on('formulario');
            $table->foreign('tecnico_id')->references('id')->on('tecnico');
            $table->foreign('tanque_id')->references('id')->on('tanques');
            $table->foreign('submissao_id')->references('id')->on('submissao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventoAgenda');
    }
}
