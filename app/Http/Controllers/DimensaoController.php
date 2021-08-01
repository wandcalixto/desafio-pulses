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
     * Retornar uma lista de dimensoes
     * @OA\Get(
     *      path="/dimensoes",
     *      operationId="getDimensoesList",
     *      tags={"Dimensoes"},
     *      summary="Retornar uma lista de dimensoes",
     *      description="Returns list of dimensoes",
     *      @OA\Response(
     *          response=200,
     *          description="Operação bem sucedida"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *     )
     *
     * Retornar uma lista de dimensoes
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dimensao = Dimensao::get();

        return new DimensaoCollection($dimensao);
    }
        /**
     * Adicionar nova dimensao ao banco de dados
     * 
     * @OA\Post(
     *     path="/dimensoes",
     *     tags={"Dimensoes"},
     *     operationId="addDimensao",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     )
     * )
     */
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
     * @OA\Get(
     *      path="/dimensoes/{id}",
     *      operationId="getDimensaoById",
     *      tags={"Dimensoes"},
     *      summary="Retornar uma dimensao pelo id",
     *      description="Returns dimensao data",
     *   @OA\Parameter(
     *          name="id",
     *          description="Dimensao id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
 *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Operação bem sucedida"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {
     *             "oauth2_security_example": {"write:dimensoes", "read:dimensoes"}
     *         }
     *     },
     * )
     */

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
     * Editar uma dimensao
     *
     * @OA\Put(
     *     path="/dimensoes/{id}",
     *     tags={"Dimensoes"},
          *   @OA\Parameter(
     *          name="id",
     *          description="Dimensao id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
 *      ),
     *     operationId="updateDimensao",
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Dimensao não encontrada"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"desafio_auth": {"write:dimensoes", "read:dimensoes"}}
     *     }
     * )
     */

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
     * @OA\Delete(
     *     path="/dimensoes/{id}",
     *     tags={"Dimensoes"},
     *     summary="Apagar uma dimensao",
     *     operationId="apagaDimensao",  
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id da dimensao a ser excluida",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Dimensao not found",
     *     ),
     *     security={
     *         {"desafio_auth": {"write:dimensao", "read:dimensao"}}
     *     },
     * )
     */
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
