<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    //

    protected $table = 'pergunta';

    /**
     * Uma Pergunta tem várias opções;
     */
    public function Opcao()
    {
        return $this->belongsToMany(Opcao::class, 'opcao_pergunta');
    }


    /**
     * Uma Pergunta tem um resposta_escrita;
     */
    public function RespostaEscrita()
    {
        return $this->hasOne(RespostaEscrita::class, 'id', 'resposta_escrita_id');
    }

    /**
     * Uma Pergunta tem um formulário;
     */
    public function Formulario()
    {
        return $this->hasOne(Formulario::class, 'id', 'formulario_id');
    }

    /**
     * Uma Pergunta tem um tema;
     */
    public function Tema()
    {
        return $this->hasOne(Tema::class, 'id', 'tema_id');
    }
}
