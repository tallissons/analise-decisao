<?php

use Illuminate\Support\Facades\Route;

use Barryvdh\DomPDF\Facade\Pdf;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::post('relatorio/pdf', function(){
    $relatorio = request()->relatorio;
    $ambiente = request()->ambiente;
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);

    $pdf = Pdf::loadView('analise_decisao_pdf', compact('relatorio', 'ambiente'));
    $path = Storage::put('public/pdf/analise_decisao.pdf', $pdf->output());

    return $path;
})->name('relatorio.pdf');
