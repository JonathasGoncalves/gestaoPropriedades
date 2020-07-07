<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventoAgendaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        return [
            'id'                => $this->id,
            'data'              => $this->data,
            'hora'              => $this->hora,
            'tecnico'           => new TecnicoResource($this->tecnico),
            'formulario'        => new FormularioResource($this->formulario),
            'tanque'            => new TanqueResource($this->Tanque),
            'submissao'         => new SubmissaoResource($this->Submissao),
        ];
    }
}
