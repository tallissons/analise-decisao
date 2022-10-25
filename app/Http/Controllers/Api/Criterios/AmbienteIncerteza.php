<?php

namespace App\Http\Controllers\Api\Criterios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmbienteIncerteza extends Controller
{
    /**
     * MaxiMax: opta-se pelo investimento com o maior retorno esperado dentre todos os previstos
     */
    public function maxi_max(Request $request)
    {
        $calc = [];
        for ($i=1; $i <= $request[ 'qnt_inv']; $i++) {
            $inv = $request['inv'.$i];
            array_push($calc, max($inv));
        }

        $maxi_max = max($calc);

        return [
            'maxi_max' => [
                'inv_indicado' => (array_search($maxi_max, $calc) + 1)
            ]
        ];
    }
}
