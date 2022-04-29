<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
class MarcasController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return $marcas;
    }
    public function listarPorId(Request $request)
    {
        $marca = Marca::find($request->id);
        return $marca;
    }
    public function editar(Request $request)
    {
        $marca = Marca::find($request->id);

        $marca->nome = $request->nome;
        $marca->descricao = $request->descricao;
        $marca->tensao = $request->tensao;
        $marca->marca_id = $request->id;

        $marca->save();
        return $marca;
    }

    public function deletar(Request $request)
    {
        $marca = Marca::find($request->id);

        $marca->delete();
    }
}
