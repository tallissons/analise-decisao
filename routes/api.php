<?php

use App\Http\Controllers\Api\Criterios\AmbienteRisco;
use App\Http\Controllers\Api\Criterios\AmbienteIncerteza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('ambiente/risco/vme', [AmbienteRisco::class, 'vme'])->name('api.risco.vme');
Route::post('ambiente/risco/poe', [AmbienteRisco::class, 'poe'])->name('api.risco.poe');
Route::post('ambiente/risco/veip', [AmbienteRisco::class, 'veip'])->name('api.risco.veip');

Route::post('ambiente/risco/maxi-max', [AmbienteIncerteza::class, 'maxi_max'])->name('api.incerteza.maxi_max');
Route::post('ambiente/risco/maxi-min', [AmbienteIncerteza::class, 'maxi_min'])->name('api.incerteza.maxi_min');
Route::post('ambiente/risco/laplace', [AmbienteIncerteza::class, 'laplace'])->name('api.incerteza.laplace');
Route::post('ambiente/risco/hurwicz', [AmbienteIncerteza::class, 'hurwicz'])->name('api.incerteza.hurwicz');
