<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RespostaPerguntaSubmissao extends Model
{
    protected $table = 'resposta_perg_submissao';
    protected $fillable = [
        'resposta_pergunta_id', 'submissao_id'
    ];

    /**
     * RespostaEscritaPerguntaSubmissao tem uma resposta_escrita_pergunta. (Esta tabela é a nxn de resposta_escrita_pergunta para submissao)
     */
    public function RespostaPergunta()
    {
        return $this->hasOne(RespostaPergunta::class, 'id', 'resposta_pergunta_id');
    }
}
