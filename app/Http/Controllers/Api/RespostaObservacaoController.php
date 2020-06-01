<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\RespostaObservacao;
use App\Http\Resources\RespostaObservacaoResource;
use App\API\ApiError;


class RespostaObservacaoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Injeção de dependência 
     */
    private $RespostaObs;
    public function __construct(RespostaObservacao $RespostaObs)
    {
        $this->RespostaObs = $RespostaObs;
    }

    public function index()
    {

        //
    }


    //rollback das imagens junto com as perguntas
    public function store(Request $request)
    {

        $imagens = $request->file('file');
        if (!$imagens) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Observação inválida!']], 4040), 404);

        $i = 0;
        $testPath = [];

        if (array_key_exists($i, $imagens)) {
            foreach ($imagens as $imagem_item) {
                if ($imagem_item) { // && $imagem_item->isValid()
                    $nameFile = $imagem_item->getClientOriginalName();
                    $arrayExplode = explode("_", $nameFile);
                    $path = 'store/observacoes/' . $arrayExplode[1] . '/' .  $arrayExplode[2];
                    $testPath[$i] = $imagem_item->storeAs($path, $nameFile);
                    $i = $i + 1;
                }
            }
        }


        return $testPath;
    }


    public function listarObservacoes(Request $request)
    {

        $observacoes =  RespostaObservacaoResource::collection(RespostaObservacao::where('submissao_id', $request->submissao_id)->get())->groupBy('tema_id');

        if (!$observacoes) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Nunhuma observação encontratada']], 4040), 404);
        return $observacoes->toArray();
    }
}
