<?php

namespace App\Http\Controllers\Api\Criterios;

use App\Http\Controllers\Controller;
use App\Services\Criterios\IncertezaService;
use Illuminate\Http\Request;

class AmbienteIncerteza extends Controller
{
    protected $incertezaService;

    public function __construct(IncertezaService $incertezaService)
    {
        $this->incertezaService = $incertezaService;
    }

    /**
     * MaxiMax: opta-se pelo investimento com o maior retorno esperado dentre todos os previstos
     */
    public function maxi_max(Request $request)
    {
        return $this->incertezaService->maxi_max($request->all());
    }

    /**
     * MaxiMin: escolhe-se o investimento com o maior retorno esperado dentre os menores retornos esperados.
     */
    public function maxi_min(Request $request)
    {
        return $this->incertezaService->maxi_min($request->all());
    }

    /**
     * Laplace: opta-se pelo investimento com a maior média aritmética dos retornos esperados
     * por investimento e o número de cenários existentes;
     */
    public function laplace(Request $request)
    {
        return $this->incertezaService->laplace($request->all());
    }

    /**
     *  Hurwicz: escolhe-se o investimento com a maior
     *   média ponderada dos retornos esperados por investimento
     *   considerando as probabilidades arbitradas de ocorrência.
     */
    public function hurwicz(Request $request)
    {
        return $this->incertezaService->hurwicz($request->all());
    }

    /**
     * MiniMax: Para cada investimento, calcula-se o custo de oportunidade,
     * ou seja, a diferença entre a melhor alternativa e a alternativa escolhida.
     */
    public function mini_max(Request $request)
    {
        return $this->incertezaService->mini_max($request->all());
    }
}
