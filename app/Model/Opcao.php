<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Opcao extends Model
{
    //

    protected $table = 'opcao';


    /**
     * Uma pergunta tem muitas opções. (Aqui é realizada a ligação nxn de Pergunta para opção)
     */
    public function Pergunta()
    {
        return $this->belongsToMany(Pergunta::class, 'OpcaoPergunta');
    }

    


}
