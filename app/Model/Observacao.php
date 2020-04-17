<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Observacao extends Model
{
    //

    protected $table = 'observacao';


    /**
     * Uma observação tem um formulario
     */
    public function Formulario()
    {
        return $this->hasOne(Formulario::class, 'id', 'formulario_id');
    }

    /**
     * Uma observação tem muitas respostaObservação. (RespostaObservação é o conteúdo da observação. Observação é o título da observação)
     */
    public function RespostaObservacao()
    {
        return $this->hasMany(RespostaObservacao::class, 'id', 'observacao_id');
    }

    /**
     * Uma Observacao tem um tema;
     */
    public function Tema()
    {
        return $this->hasOne(Tema::class, 'id', 'tema_id');
    }
}
