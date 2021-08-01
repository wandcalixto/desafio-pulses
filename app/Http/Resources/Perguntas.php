<?php

namespace App\Http\Resources;

use App\Services\LinksGenerator;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Perguntas extends ResourceCollection
{
    public $collects = Pergunta::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $links = new LinksGenerator;
        $links->addPost('create', route('perguntas.store'));

        return [
            'data'  => $this->collection,
            'links' => $links->toArray()
        ];
    }
}
