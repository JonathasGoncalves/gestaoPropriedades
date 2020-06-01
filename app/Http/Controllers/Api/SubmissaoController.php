<?php

namespace App\Http\Controllers\Api;

use App\Model\Submissao;
use App\Model\Formulario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\ApiError;
use App\Model\OpcaoPergunta;
use App\Model\Qualidade;
use App\Model\Tanque;
use App\Model\ImagemObs;
use App\Model\Tecnico;
use App\Model\RespostaEscrita;
use App\Model\Opcao;
use App\Model\RespostaObservacao;
use App\Http\Resources\SubmissaoResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

/**
 * @group Gerenciamento da Submissao 
 *
 * Esse controlador cria a submissao necessária para associar as respostas do formulário, e gera listagens intermediárias utilizadas durante o processo
 */

class SubmissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $submissao;

    /**
     * Construtor
     *
     * Injeção de dependência
     *
     */
    public function __construct(submissao $submissao)
    {
        $this->submissao = $submissao;
    }


    /**
     * Lista todas as submissões
     *
     *
     */
    public function index()
    {
        return  SubmissaoResource::collection(Submissao::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //não utilizado
        try {
            DB::beginTransaction();
            $tanque = Tanque::find($request->input('tanque_id'));
            if (!$tanque) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Tanque inexistente!']], 4040), 404);


            //**buscando e validando o tanque */
            $tecnico = Tecnico::find($request->input('tecnico_id'));
            if (!$tecnico) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Tecnico inexistente!']], 4040), 404);

            /**Buscando última qualidade e validando */
            $ultima_qualidade = Qualidade::where('tanque', $tanque->tanque)->orderBy('mes_ano', 'desc')->first();
            /**se não possui registro de qualidade, esta será inserido como null */
            if (!$ultima_qualidade) {
                $nova_submissao = [
                    'DataSubmissao' => $request->input('DataSubmissao'),
                    'qualidade_id' => null,
                    'tanque_id' => $tanque->id,
                    'realizada' => 0,
                    'tecnico_id' => $tecnico->id,
                    'aproveitamento' => 0
                ];
            } else {
                $nova_submissao = [
                    'DataSubmissao' => $request->input('DataSubmissao'),
                    'qualidade_id' => $ultima_qualidade->id,
                    'tanque_id' => $tanque->id,
                    'realizada' => 0,
                    'tecnico_id' => $tecnico->id,
                    'aproveitamento' => 0
                ];
            }



            /**Criando a submissão e associando seus itens (OpcaoResposta) */
            //
            $submissao_find = $this->submissao->create($nova_submissao);
            DB::commit();
            return $submissao_find;
        } catch (QueryException $e) {
            DB::rollback();
            if (config('app.debug')) {
                return response()->json(ApiError::errorMassage($e->getMessage(), 1010));
            }
            return response()->json(ApiError::errorMassage('Error ao inserir o valor', 1010));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Submissao  $submissao
     * @return \Illuminate\Http\Response
     */
    public function show(Submissao $submissao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Submissao  $submissao
     * @return \Illuminate\Http\Response
     */
    public function edit(Submissao $submissao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Submissao  $submissao
     * @return \Illuminate\Http\Response
     */
    public function MarcarRealizada(Request $request)
    {



        $submissaFind = $this->submissao->find($request->input('id_submissao'));
        $submissaFind->realizada = 1;
        $submissaFind->aproveitamento = $request->input('aproveitamento');
        $submissaFind->DataSubmissao = $request->input('DataSubmissao');
        $submissaFind->save();
        return new SubmissaoResource($this->submissao->find($request->input('id_submissao')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Submissao  $submissao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id_submissao = $request->input('id_submissao');
        $submissao_del = Submissao::destroy($id_submissao);
        return $submissao_del;
    }


    /**
     *  @param int formulario_id indica o tipo de formulário a ser filtrado na submissão
     *  @param int cooperado_id id do cooperado que se deseja buscar a submissão
     *
     */
    public function relatoriosPorCooperado(Request $request)
    {

        $latao_id = $request->input('latao_id');

        //verificando se o latão existe
        $latao_find = Tanque::where('latao', $latao_id)->first();
        if (!$latao_find) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Este latão não existe']], 4040), 404);

        $sub_all = SubmissaoResource::collection(Submissao::all());
        //verifica se alguma foi encontrada
        if (!$sub_all) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Não há submissões']], 4040), 404);

        //filtra as submissões baseado nos parâmetros
        $testeFilter = [];
        $i = 0;
        foreach ($sub_all as $submissao) {
            if ($submissao->tanque->latao == $latao_id) {
                array_push($testeFilter, $submissao);
            }
        }
        /*$testeFilter = $sub_all->filter(function ($submissao) use ($latao_id) {
            return  $submissao->tanque->latao == $latao_id;
        });*/

        if (!$testeFilter) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Não há submissões para esse latão']], 4040), 404);

        return $testeFilter;
    }


    public function exibirSubmissao(Request $request)
    {
        $submissao_id = $request->input('submissao_id');

        $submissao = $this->submissao->find($submissao_id);
        if (!$submissao) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Submissão não encontrada!']], 4040), 404);

        return new SubmissaoResource(Submissao::find($submissao_id));
    }


    /**
     * Método utilizado para popular uma submissão. Ele recebe um $request com o id da tabela tanques (chave de tanque/latão), 
     * o id do técnico realizou o diagnostico
     */
    public function SubmeterOpcaoPergunta(Request $request)
    {

        $submissao_id = $request->input('submissao_id');
        $OpcaoPergunta_itens = $request->input('OpcaoPergunta_itens');
        $Meta_itens = $request->input('Meta_itens');
        $observacoesSub = $request->input('observacoes');
        $resposta_escrita = $request->input('respostasEscritasSub');


        $submissao_find = $this->submissao->find($submissao_id);
        if (!$submissao_find) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Nunhuma Submissão encontratada']], 4040), 404);

        if (!$OpcaoPergunta_itens) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Nunhuma resposta enviada']], 4040), 404);
        if (in_array(null, $OpcaoPergunta_itens)) {
            return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Valor de resposta inválido']], 4422), 422);
        }

        if (!$Meta_itens) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Nunhuma meta enviada']], 4040), 404);
        if (in_array(null, $Meta_itens)) {
            return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Valor de meta inválido']], 4422), 422);
        }

        if ($submissao_find->realizada == 1)  return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Esta submissão já foi realizada!']], 4090), 409);
        try {

            /**Criando a submissão e associando seus itens (OpcaoResposta) */


            //return $resposta_escrita;
            DB::beginTransaction();

            if ($resposta_escrita) {

                $resposta_escrita_itens = array();
                foreach ($resposta_escrita as $resposta) {
                    $resp = Opcao::create(
                        [
                            'nome_opcao' => $resposta['resposta']
                        ]
                    );

                    $resposta_pergunta = OpcaoPergunta::create(
                        [
                            'opcao_id'            => $resp->id,
                            'pergunta_id'         => $resposta['pergunta_id'],
                            'positiva'            => 1
                        ]
                    );
                    array_push($OpcaoPergunta_itens, $resposta_pergunta->id);
                }

                //$submissao_find->RespostaPergunta()->attach($resposta_escrita_itens);
            }

            $submissao_find->Opcaopergunta()->attach($OpcaoPergunta_itens);

            $submissao_find->OpcaoperguntaMeta()->attach($Meta_itens);

            //return $request->all();
            $i = 0;
            $obs = [];


            foreach ($observacoesSub as $observacoes) {
                $resp = RespostaObservacao::create(
                    [
                        'texto_observacao' => $observacoes['textoObs'],
                        'tema_id' => $observacoes['tema'],
                        'submissao_id' => $observacoes['submissao']
                    ]
                );

                foreach ($observacoes['imagensSub'] as $imagem) {
                    ImagemObs::create(
                        [
                            'uri' => $imagem,
                            'resposta_observacao_id' => $resp->id,
                        ]
                    );
                }
            }

            DB::commit();
            return response()->json(['msg' => 'Submissao realizada com sucesso!'], 201);
            //retorna a submissao para realizar o request com a criação das observações
            //return response()->json($obs);

        } catch (QueryException $e) {

            DB::rollback();
            if (config('app.debug')) {
                return response()->json(ApiError::errorMassage($e->getMessage(), 1010));
            }
            return response()->json(ApiError::errorMassage('Error ao realizar submissão', 1010));
        }
    }


    public function RemoverSubmissaoOpcaoPergunta(Request $request)
    {


        $submissao_id = $request->input('submissao_id');

        //verifica se a submissao foi criada e caso sim, apaga
        if ($submissao_id <> '') {
            //desfaz a associação entre submissao e opcaoPergunta
            $submissao_find = $this->submissao->find($submissao_id);
            $submissao_find->Opcaopergunta()->detach();

            $respostas = RespostaObservacao::where('submissao_id', $submissao_id)->get();


            $ids_to_delete = array();

            foreach ($respostas as $resposta) {

                array_push($ids_to_delete, $resposta->id);
            }

            ImagemObs::whereIn('resposta_observacao_id', $ids_to_delete)->delete();

            RespostaObservacao::where('submissao_id', $submissao_id)->delete();


            //exclui submissao
            //Submissao::destroy($submissao_id);
        }

        return response()->json(['msg' => 'Submissao excluida com sucesso!'], 201);
    }

    public function UltimaSubmissao(Request $request)
    {

        $sub = $this->submissao->SubmissaoLastPorID($request->input('submissao_id'), $request->input('tanque_id'), $request->input('data_sub'), $request->input('id_form'));

        if ($sub) {
            return response()->json($sub[0]);
        } else {
            return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Nunhuma submissão encontrada']], 4040), 404);
        }
    }

    /**
     * Retorna os resourses de das ultimas qualidade de cada tanque
     */
    public function SubmissaoLast(Request $request)
    {

        return $this->submissao->SubmissaoLast();

        //return 'teste';

        //return QualidadeResource::collection($this->qualidade->where('zle_dtfim', '=', $data[0]->data)->get());
        //return $this->qualidade->where('zle_dtfim', '=', $data[0]->data)->get();

    }

    public function testeResource()
    {

        return new SubmissaoResource($this->submissao->find(9));
    }
}
