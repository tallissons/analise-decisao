<?php

namespace App\Services\Criterios;

class IncertezaService
{
    /**
     * MaxiMax: opta-se pelo investimento com o maior retorno esperado dentre todos os previstos
     */
    public function maxi_max(array $request)
    {
        $calc = [];
        for ($i=1; $i <= $request[ 'qnt_inv']; $i++) {
            $inv = $request['inv'.$i];
            array_push($calc, max($inv));
        }

        $maxi_max = max($calc);

        return [
            'maxi_max' => [
                'maxi_max' => $calc,
                'inv_indicado' => (array_search($maxi_max, $calc) + 1)
            ]
        ];
    }

    /**
     * MaxiMin: escolhe-se o investimento com o maior retorno esperado dentre os menores retornos esperados.
     */
    public function maxi_min(array $request)
    {
        $calc = [];
        for ($i=1; $i <= $request[ 'qnt_inv']; $i++) {
            $inv = $request['inv'.$i];
            array_push($calc, min($inv));
        }

        $maxi_min = max($calc);

        return [
            'maxi_min' => [
                'maxi_min' => $calc,
                'inv_indicado' => (array_search($maxi_min, $calc) + 1)
            ]
        ];
    }

    /**
     * Laplace: opta-se pelo investimento com a maior média aritmética dos retornos esperados
     * por investimento e o número de cenários existentes;
     */
    public function laplace(array $request)
    {
        $calc = [];
        for ($i=1; $i <= $request[ 'qnt_inv']; $i++) {
            $inv = $request['inv'.$i];
            array_push($calc, (array_sum($inv)/$request[ 'qnt_cenario']));
        }

        return [
            'laplace' => [
                'laplace' => $calc,
                'inv_indicado' => (array_search(max($calc), $calc) + 1)
            ]
        ];
    }

    /**
     *  Hurwicz: escolhe-se o investimento com a maior
     *   média ponderada dos retornos esperados por investimento
     *   considerando as probabilidades arbitradas de ocorrência.
     */
    public function hurwicz(array $request)
    {
        $hurwicz = [];

        for ($i=1; $i <= $request[ 'qnt_inv']; $i++) {
            $calc = [];
            $inv = $request['inv'.$i];

            for ($j=0; $j < $request['qnt_cenario']; $j++) {
                array_push($calc, $inv[$j] * ($request['cenarios'][$j]/100));
            }

            array_push($hurwicz, array_sum($calc));
        }

        return [
            'hurwicz' => [
                'hurwicz' => $hurwicz,
                'inv_indicado' => (array_search(max($hurwicz), $hurwicz) + 1),
            ]
        ];
    }

    /**
     * MiniMax: Para cada investimento, calcula-se o custo de oportunidade,
     * ou seja, a diferença entre a melhor alternativa e a alternativa escolhida.
     */
    public function mini_max(array $request)
    {
        for ($i=1; $i <= $request[ 'qnt_inv']; $i++) {
            $inv = $request['inv'.$i];

            for ($j=0; $j < $request['qnt_cenario']; $j++) {
                $aux[$j][$i] = $inv[$j];
            }
        }

        $mini_max = [];

        for ($i=0; $i < $request['qnt_cenario']; $i++) {
            $max = max($aux[$i]);

            for ($j=1; $j <= $request['qnt_inv']; $j++) {
                $custo_oportunidade[$j][$i] = $max - $aux[$i][$j];
            }

            if($i+1 <= $request['qnt_inv']){
                array_push($mini_max, max($custo_oportunidade[$i+1]));
            }

        }

        return [
            'mini_max' => [
                'custo_oportunidade' => $custo_oportunidade,
                'maiores' => $mini_max,
                'inv_indicado' => (array_search(min($mini_max), $mini_max) + 1)
            ]
        ];
    }

    public function all(array $request)
    {
        return [
            'data' => $request,
            'maxi_max' => $this->maxi_max($request)['maxi_max'],
            'maxi_min' => $this->maxi_min($request)['maxi_min'],
            'laplace' => $this->laplace($request)['laplace'],
            'hurwicz' => $this->hurwicz($request)['hurwicz'],
            'mini_max' => $this->mini_max($request)['mini_max']
        ];
    }
}
