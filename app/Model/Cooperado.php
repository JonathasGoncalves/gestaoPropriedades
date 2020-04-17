<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cooperado extends Model
{
    //
    protected $table = 'cooperados';

    /**
     * Um Cooperado pode ter muitos tanques
     */
    public function Tanques()
    {
        return $this->hasMany(Tanque::class, 'codigo_cacal', 'codigo_cacal');
    }


    public function CooperadosNome() {
        $cooperados = DB::table('cooperados')
            ->select('cooperados.codigo_cacal', 'cooperados.nome', 'cooperados.MUNICIPIO');

        $todos = DB::table('associados')
        ->select('associados.CODIGO_CACAL', 'associados.NOME', 'associados.MUNICIPIO')
        ->union($cooperados);

        $completo = DB::table('tanques')
            ->joinSub($todos, 'todos', function ($join_todos) {
                $join_todos->
                    On('todos.codigo_cacal', '=', 'tanques.codigo_cacal'); 
                })
            ->select('todos.codigo_cacal', 'todos.nome', 'tanques.latao', 'todos.MUNICIPIO', 'tanques.tanque')
            ->get();
                    

        return $completo;
    }

}
