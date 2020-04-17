<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OpcaoPerguntaResource extends JsonResource
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
            'opcao_id'      => $this->opcao_id,
            'pergunta'      => new PerguntaResource($this->Pergunta),
            'opcao_nome'    => new OpcaoResource($this->Opcao),
        ];
    }
}
