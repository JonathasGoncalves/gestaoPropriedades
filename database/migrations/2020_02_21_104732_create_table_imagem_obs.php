<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImagemObs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagemObs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uri');
            $table->unsignedInteger('respostaObservacao_id');
            $table->timestamps();

            $table->foreign('respostaObservacao_id')->references('id')->on('respostaObservacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagemObs');
    }
}
