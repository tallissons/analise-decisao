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
}
