<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TanqueResource extends JsonResource
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
            'key'               => rtrim($this->Cooperado->codigo_cacal) . rtrim($this->tanque) . rtrim($this->latao),
            'id'                => rtrim($this->id),
            'tanque'            => rtrim($this->tanque),
            'latao'             => rtrim($this->latao), 
            'matricula'         => rtrim($this->matricula),
            $this->mergeWhen($this->codigo == 7404 and $this->codigo_cacal == 7404, [
                'Cooperado'      => new CooperadoResource($this->Cooperado),
            ]),
            $this->mergeWhen($this->codigo == 7404, [
                'Cooperado'      => new AssociadoResource($this->Associado),
            ]),
            $this->mergeWhen($this->codigo <> 7404, [
                'Cooperado'      => new CooperadoResource($this->Cooperado),
            ]),
            //'codigo'            => new CooperadoResource($this->Cooperado),
            //'Associado'      => new AssociadoResource($this->Associado),
        ];
    }
}
