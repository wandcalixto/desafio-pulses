<?php

namespace App\Http\Controllers;

use App\Http\Requests\DimensaoRequest;
use App\Models\Dimensao;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Dimensao as DimensaoResource;
use App\Http\Resources\Dimensoes as DimensaoCollection;


class DimensaoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dimensao = Dimensao::orderBy('nome')->get();

        return new DimensaoCollection($dimensao);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DimensaoRequest $request)
    {
           return Dimensao::create($request->all());
    }
    
    /**
     * Display the specified resource.
     *
     * @param  Dimensao  $dimensao
     * @return \Illuminate\Http\Response
     */
    public function show(Dimensao $dimensao)
    {
        return new DimensaoResource($dimensao);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Dimensao  $dimensao
     * @return \Illuminate\Http\Response
     */
    public function update(DimensaoRequest $request, Dimensao $dimensao)
    {
        $dimensao->update($request->all());
        return [];
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param   Dimensao $dimensao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dimensao $dimensao)
    {
        $dimensao->delete();
        return [];
    }
}
