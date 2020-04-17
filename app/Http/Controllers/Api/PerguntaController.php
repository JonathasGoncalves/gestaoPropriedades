<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\Pergunta;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerguntaResource;
use App\API\ApiError;

class PerguntaController extends Controller
{
   //

   private $pergunta;
   public function __construct(Pergunta $pergunta)
   {
      $this->pergunta = $pergunta;
   }

   //recebe o id do tipo de formulario que foi solicitado
   public function listarPerguntas(Request $request)
   {


      $perguntas =  PerguntaResource::collection(Pergunta::where('formulario_id', $request->idFormulario)->get())->groupBy('tema_id');

      if (!$perguntas) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Nenhuma pergunta para esse fomulário']], 4040), 404);
      return $perguntas->toArray();
   }

   //teste -- agrupar perguntas por fumulario
   public function listarPerguntasTeste()
   {

      $perguntas =  PerguntaResource::collection(Pergunta::all())->groupBy('tema');
      //$perguntas = Pergunta::all()->groupBy('formulario_id');


      if (!$perguntas) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Nenhuma pergunta para esse fomulário']], 4040), 404);
      return $perguntas;
   }
}
