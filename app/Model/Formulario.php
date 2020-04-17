<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $table = 'formulario';


    /**
     * Um formulario tem muitas perguntas
     */
    public function Pergunta()
    {
        return $this->hasMany(Pergunta::class, 'formulario_id', 'id');
    }
}
