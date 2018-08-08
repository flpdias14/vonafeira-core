<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;
use \projetoGCA\Produto;
use \projetoGCA\ItemPedido;
class PedidoController extends Controller
{
    public function confirmar(Request $request) {
        $input = $request->input();

        $array_of_item_ids = $input['item_id'];
        $quantidades = $input['quantidade'];
        $produtos = Produto::whereIn('id', $array_of_item_ids)->get();
        $i = 0
        foreach($quantidades as $quantidade){
            if(floatval($quantidade[$i]) == 0){
                unset($quantidade[$i]);
                unset($produtos[$i]);
            }
            $i = $i+1;
        }
        // corrige as chaves dos arrays
        $produtos = array_values($produtos);
        $quantidades = array_values($quantidades);

        return view("loja.carrinho", ['produtos' => $produto, 'quantidades' => $quantidades]);  
    
    }
}

    public function finalizar(){
        $input = $request->input();

        $array_of_item_ids = $input['item_id'];
        $quantidades = $input['quantidade'];
        $produtos = Produto::whereIn('id', $array_of_item_ids)->get();
        $itens = array();
        $i = 0;
        foreach ($produtos as $produto){
            if($quantidades[$i] > 0){
                $item = new ItemPedido();
                $item->nome_produto = $produto->nome;
                $item->nome_produtor = $produto->nome_produtor;
                $item->unindade_venda = $produto->unidadeVenda->nome;
                $item->is_fracionado = $produto->unidadeVenda->is_fracionado;
                $item->is_porcao = $produto->unidadeVenda->is_porcao;
                $item->quantidades = $quantidades[$i];
                $item->preco = $produto->preco;
                array_push($itens, $item);
            }
            $i = $i + 1;
        }
    }