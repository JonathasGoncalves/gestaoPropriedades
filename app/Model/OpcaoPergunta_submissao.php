<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OpcaoPergunta_submissao extends Model
{
    protected $table = 'opcaopergunta_submissao';
    protected $fillable = [
        'opcao_pergunta_id', 'submissao_id'
    ];

    /**
     * OpcaoPergunta_submissao tem uma opcao_pergunta. (Esta tabela é a nxn de OpcaoPergunta para submissao)
     */
    public function OpcaoPergunta()
    {
        return $this->hasOne(OpcaoPergunta::class, 'id', 'opcao_pergunta_id');
    }

    
}
