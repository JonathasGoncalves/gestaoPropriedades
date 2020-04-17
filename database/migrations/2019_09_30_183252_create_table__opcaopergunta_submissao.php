<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOpcaoperguntaSubmissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcaopergunta_submissao', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('opcao_pergunta_id');
            $table->unsignedInteger('submissao_id');
            $table->timestamps();

            $table->foreign('opcao_pergunta_id')->references('id')->on('OpcaoPergunta');
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
        Schema::dropIfExists('opcaopergunta_submissao');
    }
}
