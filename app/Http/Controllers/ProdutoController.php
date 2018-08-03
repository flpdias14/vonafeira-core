<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    
    public function adicionar($idGrupoConsumo){
        $unidadeVenda = \projetoGCA\UnidadeVenda::all();
        return view("produto.adicionarProduto", ['unidadesVenda' => $unidadeVenda], ['idGrupoConsumo' => $idGrupoConsumo]); 
    }

    public function cadastrar(Request $request){
        
        
        $produto = new \projetoGCA\Produto();
        $produto->nome_produtor = $request->nomeProdutor;
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->unidadevenda_id = $request->unidadeVenda;
        $produto->grupoconsumo_id = $request->grupoConsumo;
        $produto->save();
        return redirect("/produtos/".$request->grupoConsumo);
                        
    }

    public function editar($id) {
        $produto = \projetoGCA\Produto::find($id); 
        $unidadeVenda = \projetoGCA\UnidadeVenda::all();   
        return view("produto.editarProduto", ['produto' => $produto], ['unidadesVenda' => $unidadeVenda]);
    } 

    public function remover($id) {
        $produto = \projetoGCA\Produto::find($id);
        // return var_dump($produto);
        $grupoConsumo = $produto->grupoconsumo_id;
        $produto->delete();  
        return redirect("/produtos/".$grupoConsumo);
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

            return redirect("/produtos/".$request->grupoConsumo);
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

    public function listar($idGrupoConsumo){
        if(Auth::check()){
            $produtos = \projetoGCA\Produto::where('grupoconsumo_id', '=', $idGrupoConsumo)->get();        
            return view("produto.produtos", ['produtos' => $produtos], ['idGrupoConsumo' => $idGrupoConsumo]);  
        }
        return view("/home");
    }

    public function verificarExistencia($nome){
        $produto = \projetoGCA\Produto::where ('nome', '=', $nome)->first();
        return empty($produto);
    }
}
