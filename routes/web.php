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
    return "<h1>Hello World!</h1>";
});
Route::get('/unidadesVenda', "UnidadeVendaController@listar");
Route::get('/adicionarUnidadeVenda', "UnidadeVendaController@adicionar");
Route::get('/editarUnidadeVenda/{id}', "UnidadeVendaController@editar");
Route::post('/cadastrarUnidadeVenda', "UnidadeVendaController@cadastrar");
Route::post('/atualizarUnidadeVenda', "UnidadeVendaController@atualizar");

Route::get('/erroCadastroExiste', function () {
    return "<h1>Não foi possível realizar o cadastro, já existe um registro com este nome.</h1>";
});
