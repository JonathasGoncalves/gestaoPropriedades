<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RespostaPergunta extends Model
{

    /**
     * Esta tabela é a nxn de Pergunta par Opção. 
     */

    protected $table = 'resposta_pergunta';

    protected $fillable = [
        'resposta_escrita_id', 'pergunta_id'
    ];


    /**
     * resposta_escrita_pergunta tem uma pergunta. 
     */
    public function Pergunta()
    {
        return $this->hasOne(Pergunta::class, 'id', 'pergunta_id');
    }

    /**
     * OpcaoPergunta tem uma opcao. 
     */
    public function RespostaEscrita()
    {
        return $this->hasOne(RespostaEscrita::class, 'id', 'resposta_escrita_id');
    }
}
