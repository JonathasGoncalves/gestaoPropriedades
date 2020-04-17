<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CooperadoResource extends JsonResource
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
            'codigo'        => rtrim($this->codigo),
            'codigo_cacal'  => rtrim($this->codigo_cacal),
            'matricula'     => rtrim($this->matricula),
            'nome'          => rtrim($this->nome),
            'cpf_cnpj'      => rtrim($this->cpf_cnpj),
            'cota'          => rtrim($this->cota),
            'ENDERECO'      => rtrim($this->ENDERECO), 
            'BAIRRO'        => rtrim($this->BAIRRO),
            'UF'            => rtrim($this->UF),
            'MUNICIPIO'     => rtrim($this->MUNICIPIO),
            'CEP'           => rtrim($this->CEP),
            'INSCRICAO'     => rtrim($this->INSCRICAO),
            'NIRF'          => rtrim($this->NIRF),
            'INCRA'         => rtrim($this->INCRA),
        ];
    }
}
