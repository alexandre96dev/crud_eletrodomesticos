<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function index()
    {
        $marcas = Marcas::all();
        return $marcas;
    }
    public function listarPorId(Request $request)
    {
        $marca = Marcas::find($request->id);
        return $marca;
    }
    public function editar(Request $request)
    {
        $marca = Marcas::find($request->id);

        $marca->nome = $request->nome;
        $marca->descricao = $request->descricao;
        $marca->tensao = $request->tensao;
        $marca->marca_id = $request->id;

        $marca->save();
        return $marca;
    }

    public function deletar(Request $request)
    {
        $marca = Marcas::find($request->id);

        $marca->delete();
    }
}
