<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubmissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissao', function (Blueprint $table) {
            $table->increments('id');
            $table->date('DataSubmissao');
            $table->integer('qualidade_id')->nullable();
            $table->integer('tanque_id');
            $table->integer('realizada');
            $table->unsignedInteger('tecnico_id');
            $table->integer('aproveitamento');
            $table->timestamps();

            /**Esse campo é o id de tanques, cada id tem uma combinação de tamque/latão. Deve-se usar essa campo no join e o campo tanques.tanque no select.*/
            $table->foreign('tanque_id')->references('id')->on('tanques');
            $table->foreign('qualidade_id')->references('id')->on('qualidade-leite');
            $table->foreign('tecnico_id')->references('id')->on('tecnico');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissao');
    }
}
