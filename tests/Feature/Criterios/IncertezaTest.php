<?php

namespace Tests\Feature\Criterios;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncertezaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_maxi_max()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson(route('api.incerteza.maxi_max'), [
            'qnt_cenario' => 3,
            'qnt_inv' => 3,
            'cenarios' => [25, 35, 40],
            'inv1' => [100.00, 210.0, 140.0],
            'inv2' => [120.0, 80.0, 190.0],
            'inv3' => [170.0, 200.0, 140.0]
        ]);

        $response->assertJson([
            'maxi_max' => [
                'inv_indicado' => 1 //inv1
            ]
        ]);
    }

    public function test_maxi_min()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson(route('api.incerteza.maxi_min'), [
            'qnt_cenario' => 3,
            'qnt_inv' => 3,
            'cenarios' => [25, 35, 40],
            'inv1' => [100.00, 210.0, 140.0],
            'inv2' => [120.0, 80.0, 190.0],
            'inv3' => [170.0, 200.0, 140.0]
        ]);

        $response->assertJson([
            'maxi_min' => [
                'inv_indicado' => 3 //inv3
            ]
        ]);
    }

    public function test_laplace()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson(route('api.incerteza.laplace'), [
            'qnt_cenario' => 3,
            'qnt_inv' => 3,
            'cenarios' => [25, 35, 40],
            'inv1' => [100.00, 210.0, 140.0],
            'inv2' => [120.0, 80.0, 190.0],
            'inv3' => [170.0, 200.0, 140.0]
        ]);

        $response->assertJson([
            'laplace' => [
                'inv_indicado' => 3 //inv3
            ]
        ]);
    }

    public function test_hurwicz()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson(route('api.incerteza.hurwicz'), [
            'qnt_cenario' => 3,
            'qnt_inv' => 3,
            'cenarios' => [25, 35, 40],
            'inv1' => [100.00, 210.0, 140.0],
            'inv2' => [120.0, 80.0, 190.0],
            'inv3' => [170.0, 200.0, 140.0]
        ]);

        $response->assertJson([
            'hurwicz' => [
                'inv_indicado' => 3 //inv3
            ]
        ]);
    }
}
