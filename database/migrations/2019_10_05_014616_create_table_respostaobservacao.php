<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRespostaobservacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostaobservacao', function (Blueprint $table) {

            $table->increments('id');
            $table->string('texto_observacao')->nullable();
            $table->unsignedInteger('tema_id');
            $table->unsignedInteger('submissao_id');
            $table->timestamps();

            $table->foreign('tema_id')->references('id')->on('tema');
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
        Schema::dropIfExists('respostaobservacao');
    }
}
