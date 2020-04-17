<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QualidadeResource extends JsonResource
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
            'id'            => rtrim($this->id), 
            'key'           => rtrim($this->id) . rtrim($this->Tanque->id),
            'tanque'        => rtrim($this->tanque), 
            'matricula'     => rtrim($this->matricula), 
            'faixa'         => rtrim($this->faixa),
            'zle_dtfim'     => rtrim($this->zle_dtfim), 
            'mes_ano'       => rtrim($this->mes_ano),
            'volume'        => rtrim($this->volume), 
            'VALOR'         => rtrim($this->VALOR), 
            'valor_a'       => rtrim($this->valor_a), 
            'gordura'       => rtrim($this->gordura),
            'zz3_est'       => rtrim($this->zz3_est), 
            'ccs'           => rtrim($this->ccs), 
            'cbt'           => rtrim($this->cbt),
            'tanque'    =>  new TanqueResource($this->Tanque),
        ];  
    }
}
