<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ConsumidorController extends Controller
{
    
    public function adicionar(){
        $user = \projetoGCA\User::all();
        $grupoConsumo = \projetoGCA\GrupoConsumo::all();
        return view("consumidor.adicionarConsumidor", ['users' => $user], ['gruposConsumo' => $grupoConsumo]); 
    }

    public function cadastrar(Request $request){
             
        $consumidor = new \projetoGCA\Consumidor();
        $consumidor->user_id = Auth::user()->id;
        $consumidor->grupo_consumo_id = $request->grupoConsumo;
        $consumidor->save();
        return redirect("/home");
                        
    }

    public function listar($idGrupoConsumo){
        if(Auth::check()){
            $consumidores = \projetoGCA\Consumidor::where('grupo_consumo_id', '=', $idGrupoConsumo)->get();
            return view("consumidor.consumidores", ['consumidores' => $consumidores]);  
        }
        return view("/home");
    }

    public function selecionarGrupo(){
        $gruposConsumo = \projetoGCA\GrupoConsumo::all();
        return view('consumidor.selecionarGrupo',  ['gruposConsumo' => $gruposConsumo]);
    }

}
