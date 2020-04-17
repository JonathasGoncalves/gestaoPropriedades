<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssociadoResource extends JsonResource
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
            'codigo'        => rtrim($this->CODIGO),
            'codigo_cacal'  => rtrim($this->CODIGO_CACAL),
            'matricula'     => rtrim($this->MATRICULA),
            'nome'          => rtrim($this->NOME),
            'cpf_cnpj'      => rtrim($this->CPF_CNPJ),
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
