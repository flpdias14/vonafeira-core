<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use \projetoGCA\Consumidor;
use \projetoGCA\GrupoConsumo;
class ConsumidorController extends Controller
{
    
    public function adicionar(){
        $user = \projetoGCA\User::all();
        $grupoConsumo = \projetoGCA\GrupoConsumo::all();
        return view("consumidor.adicionarConsumidor", ['users' => $user], ['gruposConsumo' => $grupoConsumo]); 
    }

    public function cadastrar(Request $request){
             
        $consumidor = new Consumidor();
        $consumidor->user_id = Auth::user()->id;
        $consumidor->grupo_consumo_id = $request->grupoConsumo;
        $consumidor->save();
        return redirect("/home");
                        
    }

    public function listar($idGrupoConsumo){
        if(Auth::check()){
            $consumidores = Consumidor::where('grupo_consumo_id', '=', $idGrupoConsumo)->get();
            #return var_dump($consumidores[0]->usuario->name);
            return view("consumidor.consumidores", ['consumidores' => $consumidores]);  
        }
        return view("/home");
    }

    public function selecionarGrupo(){
        $gruposConsumo = GrupoConsumo::all();
        return view('consumidor.selecionarGrupo',  ['gruposConsumo' => $gruposConsumo]);
    }

}
