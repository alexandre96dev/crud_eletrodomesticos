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
    public function listarPorId($id)
    {
        $marca = Marca::select(
            "marcas.id",
            "marcas.nome"
        )
        ->where("marcas.id", '=', $id)
        ->get();
        return $marca;
    }
    public function editar(Request $request, $id)
    {
        $marca = Marca::find($id);

        $marca->nome = $request->nome;

        $marca->save();
        return $marca;
    }
    public function inserir(Request $request)
    {
        $marca = new Marca;

        $marca->nome = $request->nome;
        $marca->save();
        return $marca;
    }
    public function deletar($id)
    {
        $marca = Marca::findorfail($id);

        $marca->delete();
    }
}
