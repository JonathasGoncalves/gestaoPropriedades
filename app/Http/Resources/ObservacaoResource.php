<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ObservacaoResource extends JsonResource
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
            'enunciado'     =>  $this->enunciado,
            'respostas'     =>  RespostaObservacaoResource::collection($this->RespostaObservacao),
            'formulario'    =>  new FormularioResource($this->Formulario),
            'tema'          =>  new TemaResource($this->tema),
            ];
    }
}
