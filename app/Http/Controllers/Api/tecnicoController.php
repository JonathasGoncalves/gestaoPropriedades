<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tecnico;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Exception;
use App\API\ApiError;


class tecnicoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Injeção de dependência 
     */
    private $tecnico;
    public function __construct(Tecnico $tecnico)
    {
        $this->tecnico = $tecnico;
    }


    public function index()
    {
        $data = ['tecnicos' => $this->tecnico->all()];
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

        try {
            DB::beginTransaction();
            $TecnicoData = $request->all();
            $tecnico_new =  Tecnico::create([
                'nome' => $TecnicoData['nome'],
                'usuario' => $TecnicoData['usuario'],
                'email' => $TecnicoData['email'],
                'password' => Hash::make($TecnicoData['password']),
            ]);
            DB::commit();
            return $tecnico_new;
        } catch (Exception $e) {
            DB::rollback();
            if (config('app.debug')) {
                return response()->json(ApiError::errorMassage($e->getMesage(), 1010));
            }
            return response()->json(ApiError::errorMassage('Error ao inserir o tecnico', 1010));
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
