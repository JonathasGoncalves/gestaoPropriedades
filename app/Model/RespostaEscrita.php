<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RespostaEscrita extends Model
{
    protected $table = 'resposta_escrita';
    protected $fillable = [
        'valor'
    ];


    /**
     * RespostaEscrita tem uma pergunta. 
     */
    public function Pergunta()
    {
        return $this->hasOne(Pergunta::class, 'id', 'pergunta_id');
    }
}
