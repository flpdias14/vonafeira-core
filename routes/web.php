<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('CadastroUsuario');
});

Route::get('/erroUsuarioExistente', function () {
    return "<h1> Usuário Existente </h1>";
});


Route::get('/listarUsuarios', 'UserController@listar');

Route::get('/cadastrarUsuario', 'UserController@cadastrar');

Route::get('/editarUsuario/{id}', 'UserController@editar');

Route::post('/adicionarUsuario', 'UserController@adicionar');

Route::post('/salvarUsuario', 'UserController@salvar');
