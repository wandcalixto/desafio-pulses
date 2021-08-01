<?php

namespace App\Http\Resources;

use App\Services\LinksGenerator;
use Illuminate\Http\Resources\Json\JsonResource;

class Pergunta extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $links = new LinksGenerator;
        $links->addGet('self', route('perguntas.show', $this->id));
        $links->addPut('update', route('perguntas.update', $this->id));
        $links->addDelete('destroy', route('perguntas.destroy', $this->id));


        return [
            'id'            => $this->id,
            'descricao'     => $this->descricao,
            'ativo'         => $this->ativo,
            'dimensao'      => new Dimensao($this->dimensao),
            'links'         => $links->toArray()
        ];
    }
}
