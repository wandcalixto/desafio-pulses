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
     * @OA\Info(
     *      version="1.0.0",
     *      title="Desafio Pulses",
     *      description="Desenvolvida como parte do desafio do processo seletivo pulses",
     *      @OA\Contact(
     *          email="wandersonsilvadils@gmail.com"
     *      ),
     *     @OA\License(
     *         name="Apache 2.0",
     *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     * )
     */

     /**
     * Retornar uma lista de perguntas paginadas
     * @OA\Get(
     *      path="/perguntas",
     *      operationId="getPerguntasList",
     *      tags={"Perguntas"},
     *      summary="Retornar uma lista de perguntas paginadas",
     *      description="Returns list of perguntas",
     *      @OA\Response(
     *          response=200,
     *          description="Operação bem sucedida"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *     )
     *
     * Retornar uma lista de perguntas paginadas
     */

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
     * Adicionar nova pergunta ao banco de dados
     * 
     * @OA\Post(
     *     path="/perguntas",
     *     tags={"Perguntas"},
     *     operationId="addPergunta",
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
    public function store(PerguntaRequest $request)
    {
           return Pergunta::create($request->all());
    }

    /**
     * @OA\Get(
     *      path="/perguntas/{id}",
     *      operationId="getPerguntaById",
     *      tags={"Perguntas"},
     *      summary="Retornar uma pergunta pelo id",
     *      description="Returns pergunta data",
     *   @OA\Parameter(
     *          name="id",
     *          description="Pergunta id",
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
     *             "oauth2_security_example": {"write:perguntas", "read:perguntas"}
     *         }
     *     },
     * )
     */

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
     * Editar uma pergunta
     *
     * @OA\Put(
     *     path="/perguntas/{id}",
     *     tags={"Perguntas"},
     *     operationId="updatePergunta",
          *   @OA\Parameter(
     *          name="id",
     *          description="Pergunta id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
 *      ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pergunta não encontrada"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"desafio_auth": {"write:perguntas", "read:perguntas"}}
     *     }
     * )
     */
    
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
     * @OA\Delete(
     *     path="/perguntas/{id}",
     *     tags={"Perguntas"},
     *     summary="Apagar uma pergunta",
     *     operationId="apagaPergunta",  
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id da pergunta a ser excluida",
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
     *         description="Pergunta not found",
     *     ),
     *     security={
     *         {"desafio_auth": {"write:pergunta", "read:pergunta"}}
     *     },
     * )
     */
    
    
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
}
