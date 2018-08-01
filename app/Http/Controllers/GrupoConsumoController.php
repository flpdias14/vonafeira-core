<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

    public function editar($id) {
        $grupoConsumo = \projetoGCA\GrupoConsumo::find($id);  
        return view("editarGrupoConsumo", ['grupoConsumo' => $grupoConsumo]);
    } 

    public function atualizar(Request $request){
        $grupoConsumo = \projetoGCA\GrupoConsumo::find($request->id);
        if($grupoConsumo->nome == $request->nome){
            $grupoConsumo->name = $request->name;
            $grupoConsumo->descricao = $request->descricao;
            $grupoConsumo->periodo = $request->periodo;
            $grupoConsumo->dia_semana = $request->dia_semana;
            $grupoConsumo->prazo_pedidos = $request->dia_semana;
            $grupoConsumo->update();

            return redirect("/gruposConsumo");
        }
        else if($this->verificarExistencia($request->nome) ){
            $grupoConsumo->name = $request->name;
            $grupoConsumo->descricao = $request->descricao;
            $grupoConsumo->periodo = $request->periodo;
            $grupoConsumo->dia_semana = $request->dia_semana;
            $grupoConsumo->prazo_pedidos = $request->dia_semana;
            $grupoConsumo->update();

            return redirect("/gruposConsumo");
        }
        return redirect("/erroCadastroExiste");
    }

    public function listar(){
        if(Auth::check()){
            $gruposConsumo = \projetoGCA\GrupoConsumo::all();
            return view("gruposConsumo", ['gruposConsumo' => $gruposConsumo]);  
        }
        return view("/home");
    }

    public function verificarExistencia($nome){
        $grupoConsumo = \projetoGCA\GrupoConsumo::where ('nome', '=', $nome)->first();
        return empty($grupoConsumo);
    }
}
