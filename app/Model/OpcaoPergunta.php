<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OpcaoPergunta extends Model
{
    //


    /**
     * Esta tabela é a nxn de Pergunta par Opção. 
     */

    protected $table = 'opcao_pergunta';

    /**
     * OpcaoPergunta tem uma pergunta. 
     */
    public function Pergunta()
    {
        return $this->hasOne(Pergunta::class, 'id', 'pergunta_id');
    }

    /**
     * OpcaoPergunta tem uma opcao. 
     */
    public function Opcao()
    {
        return $this->hasOne(Opcao::class, 'id', 'opcao_id');
    }
    
}
