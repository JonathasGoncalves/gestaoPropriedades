<?php

namespace App\Http\Controllers\Api;

use App\Model\Tanque;
use App\Model\Qualidade;
use App\Http\Controllers\Controller;
use App\Http\Resources\QualidadeResource;
use App\Http\Resources\TanqueResource;
use App\Exports\TanquesExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Facades\Excel;
use Excel;
use App\API\ApiError;


class TanqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Injeção de dependência 
     */
    private $tanque;
    public function __construct(tanque $tanque)
    {
        $this->tanque = $tanque;
    }

    public function index()
    {
        $data = ['tanque' =>  $this->tanque->paginate(10)];
        return response()->json($data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Tanque  $tanque
     * @return \Illuminate\Http\Response
     */
    public function show(Tanque $tanque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Tanque  $tanque
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanque $tanque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Tanque  $tanque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanque $tanque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Tanque  $tanque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanque $tanque)
    {
        //
    }

    /**
     * Recebe a data de referência (aaaamm), o padrão (500 ou 300) e o relatório(cbt ou ccs) - Paginado
     */
    public function GerarRelatorio(Request $request)
    {

        $tanques =  QualidadeResource::collection(Qualidade::where($request->relatorio, $request->filtro, $request->padrao)->where('zle_dtfim', '=', $request->dataReferencia)->paginate(10));

        //$tanques = $this->tanque->TanqueListagemQualidade($request->relatorio, $request->filtro, $request->padrao, $request->dataReferencia);
        if (!$tanques) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Data inválida!']], 4040), 404);
        return $tanques;
    }


    public function ListagemQualidadeGerar(Request $request)
    {
        $criado = Excel::store(new TanquesExport($request->relatorio, $request->filtro, $request->padrao, $request->dataReferencia), 'invoices.xlsx');
        if (!$criado) return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Não foi possivel gerar o arquivo!']], 4040), 404);
        return response()->json($criado);
        //return Response::download('storage/invoices.xlsx', 'filename.pdf');
        //return response()->download('storage/invoices.xlsx')->deleteFileAfterSend();

    }

    public function ListagemQualidadeEnviar()
    {

        //return Response::download('storage/invoices.xlsx', 'filename.pdf');
        if (Storage::disk('public')->exists('invoices.xlsx')) {
            return response()->download('storage/invoices.xlsx')->deleteFileAfterSend();
        } else {
            return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Nenhum arquivo foi gerado!']], 4040), 404);
        }
    }

    /**
     * Listagem utilizada para selecionar qual cooperado/latão será submetido ao diagnóstico
     */
    public function LataoPorCooperado()
    {

        return TanqueResource::collection(Tanque::all());
    }


    /**
     * Retorna o resourse de uma qualidade, recebe o codigo do cooperado
     */
    public function TanqueResourcePorID(Request $request)
    {
        return new TanqueResource(Tanque::where('tanque', $request->input('cod_tanque'))->first());
        //return Tanque::where('tanque', $request->input('cod_tanque'))->first();
        //return $request->input('cod_tanque');
    }

    /**
     * Retorna os resourses dos tanques
     */
    public function TanqueResourceAll()
    {

        
        return TanqueResource::collection($this->tanque->all());
        //return $this->qualidade->where('zle_dtfim', '=', $data[0]->data)->get();

    }
}
