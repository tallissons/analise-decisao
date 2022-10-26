<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Criterios\IncertezaService;
use App\Services\Criterios\RiscoService;
use Illuminate\Http\Request;

class AnaliseDecisao extends Controller
{
    protected $riscoService;
    protected $incertezaService;

    public function __construct(RiscoService $riscoService, IncertezaService $incertezaService)
    {
        $this->riscoService = $riscoService;
        $this->incertezaService = $incertezaService;
    }

    public function __invoke(Request $request)
    {
        $response = [];
        $request['ambiente'] = strtoupper($request->ambiente);

        if ($request['ambiente'] == 'RISCO') {
            $response = $this->riscoService->all($request->all());

        }elseif ($request['ambiente'] == 'INCERTEZA') {
            $response = $this->incertezaService->all($request->all());
        }

        return $response;
    }
}
