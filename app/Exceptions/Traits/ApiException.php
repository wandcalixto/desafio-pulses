<?php

namespace App\Exceptions\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Validation\ValidationException;

trait ApiException {


  /**
   * Retorna o erro 404
   *
   * @return void
   */
  protected function notFoundException()
  {
    return $this->getResponse(
      "Registro(s) não encontrado(s)",
      "01",
      404
    );
  }

  /**
   * Retorna o erro 500
   *
   * @return void
   */
  protected function genericException()
  {
    return $this->getResponse(
      "Erro interno no servidor",
      "02",
      500
    );
  }

  /**
   * Retornar o erro de validação
   *
   * @return void
   */
  protected function validationException($e)
  {
    return response()->json($e->errors(), $e->status);
  }

  /**
   * Retornar o erro de http
   *
   * @return void
   */
  protected function httpException($e)
  {
    $messages = [
      405 => [
        "code" => "03",
        "message" => "Verbo Http não permitido"
      ],
      403 => [
        "code" => "04",
        "message" => "Acesso não permitido"
      ]
    ];

    return $this->getResponse(
      $messages[$e->getStatusCode()]["message"],
      $messages[$e->getStatusCode()]["code"],
      $e->getStatusCode()
    );
  }

  /**
   * Mostra a resposta em json
   *
   * @param [type] $message
   * @param [type] $code
   * @param [type] $status
   * @return void
   */
  protected function getResponse($message, $code, $status)
  {
    return response()->json([
      "errors" => [
          [
              "status" => $status,
              "code" => $code,
              "message" => $message
          ]
      ]
    ], $status);
  }

}