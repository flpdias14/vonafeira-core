<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function novo(){
        return view('contato.novo');
    }

    public function cadastrar(){
        
    }
}
