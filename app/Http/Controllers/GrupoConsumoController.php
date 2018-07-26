<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrupoConsumoController extends Controller
{
    public function adicionar(){
        return view("adicionarGrupoConsumo"); 
    }

    public function cadastrar(Request $request){
        
        
        $grupoConsumo = new \projetoGCA\GrupoConsumo();
        $grupoConsumo->name = $request->name;
        $grupoConsumo->descricao = $request->descricao;
        $grupoConsumo->periodo = $request->periodo;
        $grupoConsumo->dia_semana = $request->dia_semana;
        $grupoConsumo->prazo_pedidos = $request->dia_semana;
        $user = \projetoGCA\User::where('email','=',$request->email)->first();
        $grupoConsumo->coordenador_id = $user->id;
        $grupoConsumo->save();
        return redirect("/gruposConsumo");
                        
    }

    public function listar(){
        $gruposConsumo = \projetoGCA\GrupoConsumo::where('coordenador_id', '=', Auth::user()->id);
        return view("gruposConsumo", ['gruposConsumo' => $gruposConsumo]);  
    }
}
