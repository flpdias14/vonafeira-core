<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;

class UnidadeVendaController extends Controller
{
    public function adicionar(){
        // chama view de adição de unidade de venda
        return view("adicionarUnidadeVenda"); 
    }

    public function cadastrar(Request $request){
        
        if($this->verificarExistencia($request->nome)){
            $unidadeVenda = new \projetoGCA\UnidadeVenda();
            $unidadeVenda->nome = $request->nome;
            $unidadeVenda->descricao = $request->descricao;
            $unidadeVenda->is_fracionado = $request->is_fracionado;
            $unidadeVenda->is_porcao = $request->is_porcao;
            $unidadeVenda->save();
            return redirect("/unidadesVenda");
        }

        return redirect("/erroCadastroExiste");
        

        
    }

    public function listar () {
        $unidadesVenda = \projetoGCA\UnidadeVenda::all();
        return view("unidadesVenda", ['listaUnidades' => $unidadesVenda]);    	
    }

    public function editar($id) {
        $unidadeVenda = \projetoGCA\UnidadeVenda::find($id);   
        return view("editarUnidadeVenda", ['unidadeVenda' => $unidadeVenda]);
    } 

    public function atualizar(Request $request){
        $unidadeVenda = \projetoGCA\UnidadeVenda::find($request->id);
        $unidadeVenda->nome = $request->nome;
        $unidadeVenda->descricao = $request->descricao;
        $unidadeVenda->is_fracionado = $request->is_fracionado;
        $unidadeVenda->is_porcao = $request->is_porcao;
        $unidadeVenda->update();

        return redirect("/unidadesVenda");
    }

    public function verificarExistencia($nome){
        $unidadeVenda = \projetoGCA\UnidadeVenda::where ('nome', '=', $nome)->first();
        return empty($unidadeVenda);
    }
}
