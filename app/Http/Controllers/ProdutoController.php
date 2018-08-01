<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    
    public function adicionar(){
        $unidadeVenda = \projetoGCA\UnidadeVenda::all();
        return view("adicionarProduto", ['unidadesVenda' => $unidadeVenda]); 
    }

    public function cadastrar(Request $request){
        
        
        $produto = new \projetoGCA\Produto();
        $produto->nome_produtor = $request->nomeProdutor;
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->unidadevenda_id = $request->unidadeVenda;
        $produto->grupoconsumo_id = $request->grupoConsumo;
        $user = \projetoGCA\User::where('email','=',$request->email)->first();
        $produto->save();
        return redirect("/produtos");
                        
    }

    public function editar($id) {
        $produto = \projetoGCA\Produto::find($id); 
        $unidadeVenda = \projetoGCA\UnidadeVenda::all();   
        return view("editarProduto", ['produto' => $produto], ['unidadesVenda' => $unidadeVenda]);
    } 

    public function atualizar(Request $request){
        $produto = \projetoGCA\Produto::find($request->id);
        if($produto->nome == $request->nome){
            $produto->nome_produtor = $request->nomeProdutor;
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->descricao = $request->descricao;
            $produto->unidadevenda_id = $request->unidadeVenda;
            $produto->grupoconsumo_id = $request->grupoConsumo;
            $produto->update();

            return redirect("/produtos");
        }
        else if($this->verificarExistencia($request->nome) ){
            $produto->nome_produtor = $request->nomeProdutor;
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->descricao = $request->descricao;
            $produto->unidadevenda_id = $request->unidadeVenda;
            $produto->grupoconsumo_id = $request->grupoConsumo;
            $produto->update();

            return redirect("/produtos");
        }
        return redirect("/erroCadastroExiste");
    }

    public function listar(){
        if(Auth::check()){
            $produtos = \projetoGCA\Produto::all();
            return view("produtos", ['produtos' => $produtos]);  
        }
        return view("/home");
    }

    public function verificarExistencia($nome){
        $produto = \projetoGCA\Produto::where ('nome', '=', $nome)->first();
        return empty($produto);
    }
}
