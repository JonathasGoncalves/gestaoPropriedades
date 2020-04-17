<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImagemObs extends Model
{
    protected $table = 'imagemobs';
    protected $fillable = [
        'uri', 'respostaObservacao_id'
    ];
    //
}
