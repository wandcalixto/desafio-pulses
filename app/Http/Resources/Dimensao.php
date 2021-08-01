<?php

namespace App\Http\Resources;

use App\Services\LinksGenerator;
use Illuminate\Http\Resources\Json\JsonResource;

class Dimensao extends JsonResource
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
        $links->addGet('self', route('dimensoes.show', $this->id));
        $links->addPut('update', route('dimensoes.update', $this->id));
        $links->addDelete('destroy', route('dimensoes.destroy', $this->id));

        return [
            'id'       => $this->id,
            'nome'     => $this->nome,
            'links'    => $links->toArray()
        ];
    }
}
