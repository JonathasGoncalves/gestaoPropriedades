<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    //
    protected $table = 'projeto';
    
    protected $fillable = [
        'nome'
    ];


}
