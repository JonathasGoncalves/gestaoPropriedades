<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\API\ApiError;
use App\Model\EventoAgenda;
use App\Http\Resources\EventoAgendaResource;

class EventoAgendaController extends Controller
{

    private $EventoAgenda;

    /**
     * Construtor
     *
     * Injeção de dependência
     *
     */
    public function __construct(EventoAgenda $EventoAgenda)
    {
        $this->EventoAgenda = $EventoAgenda;
    }
    //



    public function eventosPorDia(Request $request)
    {
        //$data = $this->EventoAgenda->where('data', '>=', $request->input('data'))->orderBy('hora')->get();
        $data = ['eventos' => EventoAgendaResource::collection($this->EventoAgenda->where('data', '>=', $request->input('data'))->orderBy('hora')->get())->groupBy('data')];
        return response()->json($data);
        //return $request->input('data');
    }

    public function store(Request $request)
    {

        try {

            DB::beginTransaction();
            $nova_EventoAgenda = [
                'data' => $request->input('data'),
                'hora' => $request->input('hora'),
                'tecnico_id' => $request->input('tecnico_id'),
                'fomulario_id' => $request->input('fomulario_id'),
                'tanque_id' => $request->input('tanque_id'),
                'submissao_id' => $request->input('submissao_id')
            ];

            $eventoSave = $this->EventoAgenda->create($nova_EventoAgenda);

            DB::commit();
            return $eventoSave;
        } catch (QueryException $e) {
            DB::rollback();
            if (config('app.debug')) {
                return response()->json(ApiError::errorMassage($e->getMessage(), 1010));
            }
            return response()->json(ApiError::errorMassage(['data' => ['msg' => 'Error ao inserir o evento!']], 1010), 101);
        }
    }


    public function atualizarEvento(Request $request)
    {
        $evento = $this->EventoAgenda->find($request->input('evento_id'));
        $evento->hora = $request->input('hora');
        $evento->data = $request->input('data');
        $evento->tecnico_id = $request->input('tecnico_id');
        $evento->fomulario_id = $request->input('fomulario_id');
        $evento->save();
    }

    public function excluirEvento(Request $request)
    {
        $evento = $this->EventoAgenda->find($request->input('evento_id'));

        $evento->delete();
    }
}
