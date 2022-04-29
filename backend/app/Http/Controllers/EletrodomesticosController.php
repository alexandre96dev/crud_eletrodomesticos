<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eletrodomestico;
use App\Models\Marca;
class EletrodomesticosController extends Controller
{
    public function index()
    {
        $eletrodomesticos = Eletrodomestico::select(
            "eletrodomesticos.id",
            "eletrodomesticos.nome",
            "eletrodomesticos.descricao",
            "eletrodomesticos.tensao",
            "marcas.nome AS marca"
        )
        ->join("marcas", "marcas.id", "=", "eletrodomesticos.marca_id")
        ->get();
        return $eletrodomesticos;
    }
    public function listarPorId($id)
    {
        $eletrodomesticos = Eletrodomestico::select(
            "eletrodomesticos.id",
            "eletrodomesticos.nome",
            "eletrodomesticos.descricao",
            "eletrodomesticos.tensao",
            "marcas.nome AS marca"
        )
        ->join("marcas", "marcas.id", "=", "eletrodomesticos.marca_id")
        ->where("eletrodomesticos.id", '=', $id)
        ->get();
        return $eletrodomesticos;
    }
    public function editar(Request $request, $id)
    {
        $eletrodomestico = Eletrodomestico::find($id);

        $eletrodomestico->nome = $request->nome;
        $eletrodomestico->descricao = $request->descricao;
        $eletrodomestico->tensao = $request->tensao;
        $eletrodomestico->marca_id = $request->id;

        $eletrodomestico->save();
        return $eletrodomestico;
    }
    public function inserir(Request $request)
    {
        $eletrodomestico = new Eletrodomestico;

        $eletrodomestico->nome = $request->nome;
        $eletrodomestico->descricao = $request->descricao;
        $eletrodomestico->tensao = $request->tensao;
        $eletrodomestico->marca_id = $request->id;

        $eletrodomestico->save();
        return $eletrodomestico;
    }

    public function deletar($id)
    {
        $eletrodomestico = Eletrodomestico::findorfail($id);
        $eletrodomestico->delete();
    }
}
