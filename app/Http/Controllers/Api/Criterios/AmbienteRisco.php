<?php

namespace App\Http\Controllers\Api\Criterios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmbienteRisco extends Controller
{
    /**
     *  Valor Monetário Esperado (VME): escolhe-se o investimento
     *  com a maior média ponderada dos retornos esperados por
     *  investimento considerando as probabilidades arbitradas de
     *  ocorrência;
     */
    public function vme(Request $request){
        $vme = [
            'investimentos' => []
        ];

        for ($i=1; $i <= $request[ 'qnt_inv']; $i++) {
            $calc = [];
            $inv = $request['inv'.$i];

            for ($j=0; $j < $request['qnt_cenario']; $j++) {
                array_push($calc, $inv[$j] * ($request['cenarios'][$j]/100));
            }

            array_push($vme['investimentos'], array_sum($calc));
        }

        return [
            'vme' => [
                'investimentos' => $vme['investimentos'],
                'inv_indicado' => (array_search(max($vme['investimentos']), $vme['investimentos']) + 1),
            ]
        ];
    }

    /**
     *  Perda de Oportunidade Esperada (POE): “refere-se a
     *  diferença entre o retorno ótimo e o retorno recebido. Em suma
     *  corresponde ao montante de perda por não ter decidido pela melhor
     *  alternativa.”
     */
    public function poe(Request $request)
    {
        for ($i=1; $i <= $request[ 'qnt_inv']; $i++) {
            $inv = $request['inv'.$i];

            for ($j=0; $j < $request['qnt_cenario']; $j++) {
                $aux[$j][$i] = $inv[$j];
            }
        }

        for ($i=0; $i < $request['qnt_cenario']; $i++) {
            $max = max($aux[$i]);

            for ($j=1; $j <= $request['qnt_inv']; $j++) {
                $custo_oportunidade[$j][$i] = $max - $aux[$i][$j];
            }
        }

        $poe = [
            'investimentos' => []
        ];

        for ($i=1; $i <= $request['qnt_inv']; $i++) {
            $calc = [];
            $inv = $custo_oportunidade[$i];

            for ($j=0; $j < $request['qnt_cenario']; $j++) {
                array_push($calc, $inv[$j] * ($request['cenarios'][$j]/100));
            }

            array_push($poe['investimentos'], array_sum($calc));
        }

        return [
            'poe' => [
                'investimentos' => $poe['investimentos'],
                'inv_indicado' => (array_search(min($poe['investimentos']), $poe['investimentos']) + 1)
            ]
        ];
    }
}
