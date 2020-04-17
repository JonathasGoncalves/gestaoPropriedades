<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePergunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pergunta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enunciado');
            $table->unsignedInteger('formulario_id');
            $table->unsignedInteger('tema_id');
            $table->timestamps();

            $table->foreign('formulario_id')->references('id')->on('formulario');
            $table->foreign('tema_id')->references('id')->on('tema');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pergunta');
    }
}
