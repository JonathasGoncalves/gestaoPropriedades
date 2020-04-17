<?php

namespace App\Http\Controllers\Api;

use App\Model\Cooperado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\ApiError;

class CooperadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    /**
     * Injeção de dependência 
     */
    private $cooperado;
    public function __construct(Cooperado $cooperado)
    {
        $this->cooperado = $cooperado;
    }


    public function index()
    {
        $data = ['cooperados' => $this->cooperado->paginate(10)];
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
     * @param  \App\Model\Cooperado  $cooperado
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperado $cooperado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Cooperado  $cooperado
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperado $cooperado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Cooperado  $cooperado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cooperado $cooperado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Cooperado  $cooperado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperado $cooperado)
    {
        //
    }

    public function cooperadosNome() {
        $data  = $this->cooperado->cooperadosNome();
        return $data;
    }
}
