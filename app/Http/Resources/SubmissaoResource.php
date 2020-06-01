<?php

namespace App\Http\Resources;


use App\Model\OpcaoPergunta_submissao;
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
            //'Respostas'         => OpcaoPerguntaResource::collection($this->OpcaoPergunta),
            'Metas'             => OpcaoPerguntaResource::collection($this->OpcaoPerguntaMeta),
            'observacoes'       => RespostaObservacaoResource::collection($this->RespostaObservacao),
            //'RespostasEscritas' => RespostaPerguntaResource::collection($this->RespostaPergunta),
            'OPS'               => OpcaoPergunta_SubmissaoResource::collection(OpcaoPergunta_Submissao::where('submissao_id', $this->id)->get()),
            'realizada'         => $this->realizada,
            'aproveitamento'    => $this->aproveitamento,
        ];
    }
}
