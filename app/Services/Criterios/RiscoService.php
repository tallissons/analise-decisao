<?php

namespace App\Services\Criterios;

class RiscoService
{
    /**
     *  Valor Monetário Esperado (VME): escolhe-se o investimento
     *  com a maior média ponderada dos retornos esperados por
     *  investimento considerando as probabilidades arbitradas de
     *  ocorrência;
     */
    public function vme(array $request){
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
    public function poe(array $request)
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

    /**
     *  Valor Esperado da Informação Perfeita (VEIP): permite
     *  conhecer a perda monetária entre a melhor alternativa existente e
     *  aquela que apresentaria a melhor combinação possível de cenários.
     */
    public function veip(array $request)
    {
        $vme1 = $this->vme($request);

        for ($i=1; $i <= $request['qnt_inv']; $i++) {
            $inv = $request['inv'.$i];

            for ($j=0; $j < $request['qnt_cenario']; $j++) {
                $aux[$j][$i] = $inv[$j];
            }
        }

        $inv_perf = [];
        for ($i=0; $i < $request['qnt_cenario']; $i++) {
            array_push($inv_perf, max($aux[$i]));
        }

        $request['qnt_inv'] = 1;
        $request['inv1'] = $inv_perf;

        $vme2 = $this->vme($request);

        $veip = max($vme2['vme']['investimentos']) - max($vme1['vme']['investimentos']);

        return [
            'veip' => [
                'inv_perf' => $inv_perf,
                'veip' => $veip
            ]
        ];
    }
}

