<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Qualidade;
use App\Http\Resources\QualidadeResource;

class QualidadeController extends Controller
{

    private $qualidade;
    public function __construct(Qualidade $qualidade)
    {
        $this->qualidade = $qualidade;
    }
    //

    /**
     * Retorna o resourse de uma qualidade, recebe o codigo do cooperado
     */
    public function QualidadeResourcePorID(Request $request)
    {
        //return $request->input('cod_cooperado');
        //return $request->input('cod_cooperado');
        $data =  $this->qualidade->UltimaQualidadePorCooperado($request->input('cod_cooperado'));
        //return response()->json($data);
        //return $request->input('cod_cooperado');
        return new QualidadeResource(Qualidade::find($data->id));
        //return $request;
    }

    /**
     * Retorna os resourses de das ultimas qualidade de cada tanque
     */
    public function QualidadeResourceLast(Request $request)
    {
        
        $data =  $this->qualidade->QualidadeLast();

        $qualidades  = [];

        return QualidadeResource::collection($this->qualidade->where('zle_dtfim', '=', $data[0]->data)->get());
        //return $this->qualidade->where('zle_dtfim', '=', $data[0]->data)->get();

    }

}
