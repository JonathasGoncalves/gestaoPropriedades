<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubmissaoResource extends JsonResource
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
            'tecnico'           => new TecnicoResource($this->tecnico),
            'DataSubmissao'     => $this->DataSubmissao,
            'qualidade'         => new QualidadeResource($this->Qualidade),
            'tanque'            => new TanqueResource($this->Tanque),
            'Respostas'         => OpcaoPerguntaResource::collection($this->OpcaoPergunta),
            'Metas'             => OpcaoPerguntaResource::collection($this->OpcaoPerguntaMeta),
            'observacoes'       => RespostaObservacaoResource::collection($this->RespostaObservacao),
            'RespostasEscritas' => RespostaPerguntaResource::collection($this->RespostaPergunta),
            'realizada'         => $this->realizada,
            'aproveitamento'    => $this->aproveitamento,
        ];
    }
}
