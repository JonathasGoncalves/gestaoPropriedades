<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PerguntaResource extends JsonResource
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
            'id_pergunta'       =>  $this->id,
            'enunciado'         =>  $this->enunciado,
            'tema'              =>  $this->tema,
            'opcoes'            =>  OpcaoResource::collection($this->opcao),
            'formulario'        =>  new FormularioResource($this->formulario),
            'tema'              =>  new TemaResource($this->tema),
            'respostaEscrita'   =>  new RespostaEscritaResource($this->RespostaEscrita),
        ];
    }
}
