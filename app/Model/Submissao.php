<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Submissao extends Model
{

    /**
     * Submissão tem muitas OpcaoPergunta (Aqui é feita a ligação nxn de Submissão com OpcaoPergunta)
     */
    public function OpcaoPergunta()
    {
        return $this->belongsToMany(OpcaoPergunta::class, 'OpcaoPergunta_submissao');
    }

    /**
     * Submissão tem uma qualidade
     */
    public function Qualidade()
    {
        return $this->hasOne(Qualidade::class, 'id', 'qualidade_id');
    }

    /**
     * Submissao tem um tanque
     */
    public function Tanque()
    {
        return $this->hasOne(Tanque::class, 'id', 'tanque_id');
    }

    /**
     * Submissão tem muitas RespostaObservacao
     */
    public function RespostaObservacao()
    {
        return $this->hasMany(RespostaObservacao::class, 'submissao_id', 'id');
    }

    /**
     * Submissao tem um tanque
     */
    public function Tecnico()
    {
        return $this->hasOne(Tecnico::class, 'id', 'tecnico_id');
    }

    //retorna a ultima qualidade de cada tanque
    public function SubmissaoLast() 
    {

        $ultimaData = DB::table('submissao')
            ->select(DB::raw('MAX(DataSubmissao) as DataSubmissao'),DB::raw('MAX(aproveitamento) as aproveitamento'), 'tanque_id as tanque')
            ->where('realizada', '=', '1')
            ->groupBy('tanque_id')
            ->get();

        return $ultimaData;
    }



    protected $table = 'submissao';
    protected $fillable = [
        'DataSubmissao', 'qualidade_id', 'tanque_id', 'tecnico_id', 'realizada', 'aproveitamento'
    ];
}
