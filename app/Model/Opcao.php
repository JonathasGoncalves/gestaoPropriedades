<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Opcao extends Model
{
    //

    protected $table = 'opcao';
    protected $fillable = [
        'nome_opcao'
    ];



    /**
     * Uma pergunta tem muitas opções. (Aqui é realizada a ligação nxn de Pergunta para opção)
     */
    public function Pergunta()
    {
        return $this->belongsToMany(Pergunta::class, 'opcao_pergunta');
    }

    


}
