<?php

use App\Http\Controllers\PerguntaController;
use App\Models\Pergunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/perguntas', [PerguntaController::class, 'index']);
// Route::get('/perguntas/{pergunta}', [PerguntaController::class, 'show']);
// Route::post('/perguntas', [PerguntaController::class, 'store']);
// Route::put('/perguntas/{pergunta}', [PerguntaController::class, 'update']);
// Route::delete('/perguntas/{pergunta}', [PerguntaController::class, 'destroy']);

// Route::get('/dimensoes', [DimensaoController::class, 'index']);
// Route::get('/dimensoes/{dimensao}', [DimensaoController::class, 'show']);
// Route::post('/dimensoes', [DimensaoController::class, 'store']);
// Route::put('/dimensoes/{dimensao}', [DimensaoController::class, 'update']);
// Route::delete('/dimensoes/{dimensao}', [DimensaoController::class, 'destroy']);


Route::apiResource('dimensoes', 'DimensaoController')->parameters([ 'dimensoes' => 'dimensao' ]);;
Route::apiResource('perguntas', 'PerguntaController');