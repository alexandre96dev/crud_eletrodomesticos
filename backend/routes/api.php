<?php

use App\Http\Controllers\EletrodomesticosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcasController;

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
Route::get("/eletrodomesticos", [EletrodomesticosController::class, 'index']);
Route::get("/eletrodomesticos/{id}", [EletrodomesticosController::class, 'listarPorId']);
Route::get("/marcas/", [MarcasController::class, 'index']);
Route::get("/marcas/{id}", [MarcasController::class, 'listarPorId']);
Route::post('/eletrodomesticos', [EletrodomesticosController::class, 'inserir']);
Route::get('/eletrodomesticos/deletar/{id}', [EletrodomesticosController::class, 'deletar']);
Route::put("/eletrodomesticos/{id}", [EletrodomesticosController::class, 'editar']);
