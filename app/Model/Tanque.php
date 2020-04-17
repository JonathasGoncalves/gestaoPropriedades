<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Tanque extends Model
{
    //
    protected $table = 'tanques'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'codigo', 'codigo_cacal', 'tanque', 'latao', 'matricula'
    ];

    /**
     * Tanque tem um Associado
     */
    public function Associado()
    {
        return $this->hasOne(Associado::class, 'CODIGO_CACAL', 'codigo_cacal');
    }

    /**
     * Tanque tem um cooperado
     */
    public function Cooperado()
    {
        return $this->hasOne(Cooperado::class, 'codigo', 'codigo');
    }

    public function TanqueListagemQualidade($relatorio, $filtro, $padrao, $dataReferencia) {
        
        
        $filtroPadrao = true;
        if($filtro != '<=') {
            $filtroPadrao = false;
        }

        $cooperados = DB::table('cooperados')
            ->select('cooperados.codigo', 'cooperados.codigo_cacal', 'cooperados.nome', 'cooperados.MUNICIPIO');

        $todos = DB::table('associados')
        ->select('associados.CODIGO' , 'associados.CODIGO_CACAL', 'associados.NOME', 'associados.MUNICIPIO')
        ->union($cooperados);

        $tanques = DB::table('tanques')
        ->select('todos.codigo', 'todos.codigo_cacal', 'todos.nome', 'todos.MUNICIPIO', 'tanques.id', 'qualidade-leite.cbt', 'qualidade-leite.ccs', 'qualidade-leite.zle_dtfim', 'tanques.id'  )
        //->select(DB::raw('CONCAT(qualidade-leite.id, tanque.id) as chave'),'qualidade-leite.tanque', 'todos.codigo', 'todos.codigo_cacal', 'todos.nome', 'todos.MUNICIPIO', 'tanques.id', 'qualidade-leite.cbt', 'qualidade-leite.ccs', 'qualidade-leite.zle_dtfim', 'tanques.id' , 'qualidade-leite.id')
        ->join('qualidade-leite', 'tanques.tanque', '=', 'qualidade-leite.tanque')
        ->when($filtroPadrao, function ($q) use ($relatorio, $padrao, $dataReferencia) {
            return $q->where($relatorio, '<=', $padrao)->where('zle_dtfim', '=', $dataReferencia);
        })
        ->when(!$filtroPadrao, function ($q) use ($relatorio, $padrao, $dataReferencia) {
            return $q->where($relatorio, '>', $padrao)->where('zle_dtfim', '=', $dataReferencia);
        })
        //->where($relatorio, '>=', $padrao)
        ->joinSub($todos, 'todos', function ($join) {
            $join->on('tanques.codigo', '=', 'todos.codigo_cacal');
        })
        ->distinct()
        ->get();
        


        return $tanques;

    }

    

    

    
}
