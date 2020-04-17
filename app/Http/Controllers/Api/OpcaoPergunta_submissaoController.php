<?php

namespace App\Http\Controllers\Api;

use App\Model\OpcaoPergunta_submissao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\ApiError;


/**
 * nxn de pcaoPergunta para submissão
 */
class OpcaoPergunta_submissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Injeção de dependência 
     */
    private $OpcaoPergunta_submissao;

    public function __construct(OpcaoPergunta_submissao $OpcaoPergunta_submissao)
    {
        $this->OpcaoPergunta_submissao = $OpcaoPergunta_submissao;
    }


    public function index()
    {
        $data = ['OpcaoPergunta_submissao' =>  $this->OpcaoPergunta_submissao->paginate(10)];
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\OpcaoPergunta_submissao  $opcaoPergunta_submissao
     * @return \Illuminate\Http\Response
     */
    public function show(OpcaoPergunta_submissao $opcaoPergunta_submissao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\OpcaoPergunta_submissao  $opcaoPergunta_submissao
     * @return \Illuminate\Http\Response
     */
    public function edit(OpcaoPergunta_submissao $opcaoPergunta_submissao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\OpcaoPergunta_submissao  $opcaoPergunta_submissao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpcaoPergunta_submissao $opcaoPergunta_submissao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\OpcaoPergunta_submissao  $opcaoPergunta_submissao
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpcaoPergunta_submissao $opcaoPergunta_submissao)
    {
        //
    }
}
