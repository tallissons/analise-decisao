<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Criterios\RiscoService;
use Illuminate\Http\Request;

class AnaliseDecisao extends Controller
{
    protected $riscoService;

    public function __construct(RiscoService $riscoService)
    {
        $this->riscoService = $riscoService;
    }

    public function __invoke(Request $request)
    {
        $response = [];

        if (strtoupper($request->ambiente) == 'RISCO') {
            $response = $this->riscoService->all($request->all());

        }elseif (strtoupper($request->ambiente) == 'INCERTEZA') {
            # code...
        }

        return $response;
    }
}
