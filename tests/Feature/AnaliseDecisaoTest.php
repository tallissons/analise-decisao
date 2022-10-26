<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnaliseDecisaoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_analise_ambiente_risco()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson(route('api.analise.decisao'), [
            'ambiente' => 'Risco',
            'qnt_cenario' => 3,
            'qnt_inv' => 3,
            'cenarios' => [25, 35, 40],
            'inv1' => [100.00, 210.0, 140.0],
            'inv2' => [120.0, 80.0, 190.0],
            'inv3' => [170.0, 200.0, 140.0]
        ]);

        $response->assertJson([
            'vme' => [
                'investimentos' => [
                    154.5, //vme inv1
                    134.0, //vme inv2
                    168.5 //vme inv3
                ],
                'inv_indicado' => 3 //inv3
            ],
            'poe' => [
                'investimentos' => [
                    37.5, // Perdas Ponderadas inv1
                    58.0, // Perdas Ponderadas inv2
                    23.5 // Perdas Ponderadas inv3
                ],
                'inv_indicado' => 3 //inv3
            ],
            'veip' => [
                'inv_perf' => [170.0, 210.0, 190.0],
                'veip' => 23.5
            ]
        ]);
    }
}
