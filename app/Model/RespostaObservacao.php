<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RespostaObservacao extends Model
{
    //

    protected $table = 'respostaobservacao';

    protected $fillable = [
        'texto_observacao', 'imagens', 'tema_id',  'submissao_id'
    ];

    /**
     * RespostaObservacao (conteúdo da observação), tem uma submissão
     */
    public function Submissao()
    {
        return $this->hasOne(Submissao::class, 'id', 'submissao_id');
    }

    /**
     * Uma Observacao tem um tema;
     */
    public function Tema()
    {
        return $this->hasOne(Tema::class, 'id', 'tema_id');
    }


    /**
     * Submissão tem muitas RespostaObservacao
     */
    public function Imagem()
    {
        return $this->hasMany(ImagemObs::class, 'respostaObservacao_id', 'id');
    }
}
