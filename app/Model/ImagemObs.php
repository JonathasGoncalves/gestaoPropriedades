<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImagemObs extends Model
{
    protected $table = 'imagem_obs';
    protected $fillable = [
        'uri', 'resposta_observacao_id'
    ];
    //
}
