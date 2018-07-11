<?php

namespace projetoGCA\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function adicionar(Request $request){
        $user = new \projetoGCA\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect("/");
    }
}
