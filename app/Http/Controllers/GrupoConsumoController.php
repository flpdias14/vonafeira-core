<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class GrupoConsumoController extends Controller
{
    
    public function novo(){
        return view("grupoConsumo.adicionarGrupoConsumo"); 
    }

    public function cadastrar(Request $request){
        $grupoConsumo = new \projetoGCA\GrupoConsumo();
        $grupoConsumo->name = $request->name;
        $grupoConsumo->descricao = $request->descricao;
        $grupoConsumo->periodo = $request->periodo;
        $grupoConsumo->dia_semana = $request->dia_semana;
        $grupoConsumo->prazo_pedidos = $request->prazo_pedidos;
        $user = \projetoGCA\User::where('email','=',$request->email)->first();
        $grupoConsumo->coordenador_id = Auth::user()->id;
        $grupoConsumo->save();
        // Redireciona para a listagem de grupo de Consumos, passando o nome do grupo que foi cadastrado
        return redirect()
                ->action('GrupoConsumoController@listar')
                ->withInput();        
    }

    public function editar($id) {
        $grupoConsumo = \projetoGCA\GrupoConsumo::find($id);  
        return view("grupoConsumo.editarGrupoConsumo", ['grupoConsumo' => $grupoConsumo]);
    } 

    public function atualizar(Request $request){
        $grupoConsumo = \projetoGCA\GrupoConsumo::find($request->id);
        if($grupoConsumo->nome == $request->nome){
            $grupoConsumo->name = $request->name;
            $grupoConsumo->descricao = $request->descricao;
            $grupoConsumo->periodo = $request->periodo;
            $grupoConsumo->dia_semana = $request->dia_semana;
            $grupoConsumo->prazo_pedidos = $request->prazo_pedidos;
            $grupoConsumo->update();

            return redirect()
                    ->action('GrupoConsumoController@listar');
        }
        else if($this->verificarExistencia($request->nome) ){
            $grupoConsumo->name = $request->name;
            $grupoConsumo->descricao = $request->descricao;
            $grupoConsumo->periodo = $request->periodo;
            $grupoConsumo->dia_semana = $request->dia_semana;
            $grupoConsumo->prazo_pedidos = $request->prazo_pedidos;
            $grupoConsumo->update();

            return redirect()->action('GrupoConsumoController@listar');
        }
        return redirect("/erroCadastroExiste");
    }


    public function listar(){
        if(Auth::check()){
            $gruposConsumo = \projetoGCA\GrupoConsumo::where('coordenador_id', '=', Auth::user()->id)->get();
            return view("grupoConsumo.gruposConsumo", ['gruposConsumo' => $gruposConsumo]);  
        }
        return view("/home");
    }

    public function listarGrupos(){
        if(Auth::check()){
            $gruposConsumo = \projetoGCA\GrupoConsumo::all();
        }
        return $grupoConsumo;
    }

    public function gerenciar($idGrupoConsumo){
        $grupoConsumo = \projetoGCA\GrupoConsumo::find($idGrupoConsumo);
        return view("grupoConsumo.gerenciarGrupo", ['grupoConsumo' => $grupoConsumo]);
    }
}
