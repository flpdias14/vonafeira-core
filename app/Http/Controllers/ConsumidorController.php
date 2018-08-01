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
        return view("adicionarConsumidor", ['users' => $user], ['gruposConsumo' => $grupoConsumo]); 
    }

    public function cadastrar(Request $request){
             
        $consumidor = new \projetoGCA\Consumidor();
        $consumidor->consumidor_id = $request->usuario;
        $consumidor->grupoconsumo_id = $request->grupoConsumo;
        $consumidor->save();
        return redirect("/consumidores");
                        
    }

    public function listar(){
        if(Auth::check()){
            $consumidores = \projetoGCA\Consumidor::all();
            return view("consumidores", ['consumidores' => $consumidores]);  
        }
        return view("/home");
    }

}
