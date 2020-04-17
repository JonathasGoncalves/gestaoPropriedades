<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RespostaObservacaoResource extends JsonResource
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
            'id'                    => $this->id,
            'texto_observacao'      => $this->texto_observacao,
            'imagens'               => ImagemResource::collection($this->imagem),
            'tema'                  => new TemaResource($this->tema),

        ];
    }
}
            ///http://192.168.1.22:8000/storage/store/observacoes_1_1/_1_1_imageOBS80359.jpg

            ///http://192.168.1.22:8000/storage/1/1/1.jpg