<?php

namespace App\Http\Controllers\Api\Criterios;

use App\Http\Controllers\Controller;
use App\Services\Criterios\RiscoService;
use Illuminate\Http\Request;

class AmbienteRisco extends Controller
{
    protected $riscoService;

    public function __construct(RiscoService $riscoService)
    {
        $this->riscoService = $riscoService;
    }

    /**
     *  Valor Monetário Esperado (VME): escolhe-se o investimento
     *  com a maior média ponderada dos retornos esperados por
     *  investimento considerando as probabilidades arbitradas de
     *  ocorrência;
     */
    public function vme(Request $request){
        return $this->riscoService->vme($request->all());
    }

    /**
     *  Perda de Oportunidade Esperada (POE): “refere-se a
     *  diferença entre o retorno ótimo e o retorno recebido. Em suma
     *  corresponde ao montante de perda por não ter decidido pela melhor
     *  alternativa.”
     */
    public function poe(Request $request)
    {
        return $this->riscoService->poe($request->all());
    }

    /**
     *  Valor Esperado da Informação Perfeita (VEIP): permite
     *  conhecer a perda monetária entre a melhor alternativa existente e
     *  aquela que apresentaria a melhor combinação possível de cenários.
     */
    public function veip(Request $request)
    {
        return $this->riscoService->veip($request->all());
    }
}
