<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerguntaRequest;
use App\Models\Pergunta;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Pergunta as PerguntaResource;
use App\Http\Resources\Perguntas as PerguntaCollection;


class PerguntaController extends Controller
{
   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perguntas = Pergunta::paginate(10);

        return new PerguntaCollection($perguntas);
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerguntaRequest $request)
    {
           return Pergunta::create($request->all());
    }

   

    /**
     * Display the specified resource.
     *
     * @param  Pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pergunta $pergunta)
    {
        return new PerguntaResource($pergunta);
    }
    
     
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function update(PerguntaRequest $request, Pergunta $pergunta)
    {
        $pergunta->update($request->all());
        return [];
    }
   
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param   Pergunta $pergunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pergunta $pergunta)
    {
        $pergunta->delete();
        return [];
    }
    /**
     * List of perguntas by dimensao_id
     *
     * @param integer $dimensao_id
     * @return void
     */
    public function perguntasByDimensaoId(int $dimensao_id)
    {
        
        $perguntas = Pergunta::where('dimensao_id', $dimensao_id)->paginate(10);        

        return new PerguntaCollection($perguntas);
    }
}
