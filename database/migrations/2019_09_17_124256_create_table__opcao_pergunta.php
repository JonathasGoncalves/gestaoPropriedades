<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOpcaoPergunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OpcaoPergunta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('opcao_id');
            $table->unsignedInteger('pergunta_id');
            $table->integer('positiva');
            $table->timestamps();

            $table->foreign('opcao_id')->references('id')->on('opcao');
            $table->foreign('pergunta_id')->references('id')->on('pergunta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OpcaoPergunta');
    }
}
