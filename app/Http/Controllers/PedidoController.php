<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function create(Request $request) {
        $input = $request->input();
    
        $array_of_item_ids = $input['item_id'];
        return view("/home");
        //return view("loja.carrinho", ['array_of_item_ids' => $array_of_item_ids]);  
    
    }
}
