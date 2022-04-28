<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eletrodomestico;

class EletrodomesticosController extends Controller
{
    public function index()
    {
        $eletrodomesticos = Eletrodomestico::all();
        return $eletrodomesticos;
    }
    public function listarPorId(Request $request)
    {
        $eletrodomesticos = Eletrodomestico::find($request->id);
        return $eletrodomesticos;
    }
    public function editar(Request $request)
    {
        $eletrodomestico = Eletrodomestico::find($request->id);

        $eletrodomestico->nome = $request->nome;
        $eletrodomestico->descricao = $request->descricao;
        $eletrodomestico->tensao = $request->tensao;
        $eletrodomestico->marca_id = $request->id;

        $eletrodomestico->save();
        return $eletrodomestico;
    }

    public function deletar(Request $request)
    {
        $eletrodomestico = Eletrodomestico::find($request->id);

        $eletrodomestico->delete();
    }
}
