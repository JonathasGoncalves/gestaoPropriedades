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
        $qualidade = null;
        $data =  $this->qualidade->QualidadeLast();
        $ultimaQualidade = $this->qualidade->UltimaQualidadePorCooperado($request->input('tanque'), $data[0]->data);

        if ($ultimaQualidade != null) {
            $qualidade = new QualidadeResource(Qualidade::find($ultimaQualidade->id));
        }

        return $qualidade;
    }

    /**
     * Retorna os resourses de das ultimas qualidade de cada tanque
     */
    public function QualidadeResourceLast(Request $request)
    {

        $data =  $this->qualidade->QualidadeLast();
        return QualidadeResource::collection($this->qualidade->where('zle_dtfim', '=', $data[0]->data)->get());
    }
}
