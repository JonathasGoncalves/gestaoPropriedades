<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\OpcaoPergunta;
use App\Http\Controllers\Controller;

class OpcaoPerguntaController extends Controller
{
    //

    private $opcaoPergunta;
     public function __construct(OpcaoPergunta $opcaoPergunta) {
        $this->opcaoPergunta = $opcaoPergunta;
     }


     //recebe o id da pergunta e o id da opcao. Retorna um OpcaoPergunta
    public function OpcaoPerguntaFind(Request $request) {
        $opcaoPerguntaFind = OpcaoPergunta::all()->where('opcao_id', '=', $request->opcao_id)->where('pergunta_id', '=', $request->pergunta_id)->first();
        return $opcaoPerguntaFind;

    }

      //recebe o id da opcaoPergunta  e Retorna um OpcaoPergunta
      public function OpcaoPerguntaByID(Request $request) {
        $opcaoPerguntaFind = OpcaoPergunta::find($request->id);
        return $opcaoPerguntaFind;

    }

     //recebe o aid da pergunta e o id da opcao. Retorna um OpcaoPergunta
     public function OpcaoPerguntaALL() {
        $opcaoPerguntaAll = OpcaoPergunta::all();
        return $opcaoPerguntaAll;
    }
}
