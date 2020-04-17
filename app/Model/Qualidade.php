<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Qualidade extends Model
{
    //
    protected $table = 'qualidade-leite';


    //Uma qualidade tem um tanque
    public function Tanque()
    {
        return $this->hasOne(Tanque::class, 'tanque', 'tanque');
    }

    //recebe o id do cooperado e retorna o id da ultima qualidade dele
    public function UltimaQualidadePorCooperado($cod_cooperado)
    {

        $todos = DB::table('qualidade-leite')
            ->select('qualidade-leite.id')
            ->join('tanques', 'tanques.tanque', '=', 'qualidade-leite.tanque')
            ->where('tanques.codigo_cacal', '=', $cod_cooperado)
            ->orderBy('qualidade-leite.zle_dtfim', 'desc')
            ->first();

        return $todos;
    }

    //retorna a ultima qualidade de cada tanque
    public function QualidadeLast() 
    {

        $ultimaData = DB::table('qualidade-leite')
            ->select(DB::raw('MAX(zle_dtfim) as data'))
            ->get();

        return $ultimaData;
    }

}
