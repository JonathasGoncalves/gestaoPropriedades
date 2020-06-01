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
        return $this->belongsToMany(OpcaoPergunta::class, 'opcao_pergunta_submissao');
    }

    /**
     * Submissão tem muitas OpcaoPergunta (Aqui é feita a ligação nxn de Submissão com OpcaoPergunta) meta
     */
    public function OpcaoPerguntaMeta()
    {
        return $this->belongsToMany(OpcaoPergunta::class, 'meta_submissao');
    }

    /**
     * Submissão tem muitas respostas_escritas (Aqui é feita a ligação nxn de Submissão com OpcaoPergunta)
     */
    public function RespostaPergunta()
    {
        return $this->belongsToMany(RespostaPergunta::class, 'resposta_perg_submissao');
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

    //retorna a ultima submissao de cada tanque, para realizar a comparação com a submissao atuaç
    public function SubmissaoLast()
    {

        /*$ultimaData = DB::table('submissao')
            ->select(DB::raw('MAX(DataSubmissao) as DataSubmissao, tanque_id as tanque, aproveitamento'))
            ->where('realizada', '=', '1')
            ->groupBy('tanque_id', 'aproveitamento')
            ->orderBy('DataSubmissao', 'desc')
            ->get();*/

        $ultimaData = DB::table('submissao')
            ->join('evento_agenda', 'evento_agenda.submissao_id', '=', 'submissao.id')
            ->select(DB::raw('MAX(submissao.DataSubmissao) as DataSubmissao'), 'submissao.tanque_id as tanque', 'submissao.aproveitamento', 'evento_agenda.fomulario_id') //DB::raw('MAX(aproveitamento) as aproveitamento'),
            ->where('submissao.realizada', '=', '1')
            ->groupBy('submissao.tanque_id', 'submissao.aproveitamento', 'evento_agenda.fomulario_id')
            ->orderBy('DataSubmissao', 'desc')
            ->get();

        return $ultimaData;
    }

    //retorna a ultima submissao de um tanque, para realizar a comparação com a submissao atual
    public function SubmissaoLastPorID($id_sub, $id_tanque, $data_sub, $id_form)
    {
        $data = strval($data_sub);

        $ultimaData = DB::table('submissao')
            ->join('evento_agenda', 'evento_agenda.submissao_id', '=', 'submissao.id')
            ->select(DB::raw('MAX(submissao.DataSubmissao) as DataSubmissao'), 'submissao.tanque_id as tanque', 'submissao.aproveitamento') //DB::raw('MAX(aproveitamento) as aproveitamento'),
            ->where('evento_agenda.fomulario_id', '=', $id_form)
            ->where('submissao.realizada', '=', '1')
            ->where('submissao.id', '<>', $id_sub)
            ->where('submissao.DataSubmissao', '<', $data)
            ->where('submissao.tanque_id', '=', $id_tanque)
            ->groupBy('submissao.tanque_id', 'submissao.aproveitamento')
            ->orderBy('DataSubmissao', 'desc')
            ->take(1)
            ->get();

        return $ultimaData;
    }




    protected $table = 'submissao';
    protected $fillable = [
        'DataSubmissao', 'qualidade_id', 'tanque_id', 'tecnico_id', 'realizada', 'aproveitamento'
    ];
}
