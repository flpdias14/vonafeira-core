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

// Route::get('/', function () {
//     return view('CadastroUsuario');
// });


Route::get('/erroUsuarioExistente', function () {
    return "<h1> Usuário Existente </h1>";
});


Route::get('/listarUsuarios', 'UserController@listar');

Route::get('/cadastrarUsuario', 'UserController@cadastrar');

Route::get('/editarUsuario/{id}', 'UserController@editar');

Route::post('/adicionarUsuario', 'UserController@adicionar');

Route::post('/salvarUsuario', 'UserController@salvar');

Route::get('/unidadesVenda', "UnidadeVendaController@listar");
Route::get('/adicionarUnidadeVenda', "UnidadeVendaController@adicionar");
Route::get('/editarUnidadeVenda/{id}', "UnidadeVendaController@editar");
Route::post('/cadastrarUnidadeVenda', "UnidadeVendaController@cadastrar");
Route::post('/atualizarUnidadeVenda', "UnidadeVendaController@atualizar");

Route::get('/erroCadastroExiste', function () {
    return "<h1>Não foi possível realizar o cadastro, já existe um registro com este nome.</h1>";
});

Route::post('/cadastrarProduto', 'ProdutoController@cadastrar');
Route::get('/editarProduto/{id}', 'ProdutoController@editar');
Route::get('/adicionarProduto',  'ProdutoController@adicionar');
Route::post('/atualizarProduto', "ProdutoController@atualizar");
Route::get('/produtos', 'ProdutoController@listar');

Route::post('/cadastrarConsumidor', 'ConsumidorController@cadastrar');
Route::get('/adicionarConsumidor',  'ConsumidorController@adicionar');
Route::get('/consumidores', 'ConsumidorController@listar');

Route::post('/cadastrarGrupoConsumo', 'GrupoConsumoController@cadastrar');
Route::get('/editarGrupoConsumo/{id}', 'GrupoConsumoController@editar');
Route::get('/adicionarGrupoConsumo',  'GrupoConsumoController@adicionar');
Route::post('/atualizarGrupoConsumo', "GrupoConsumoController@atualizar");
Route::get('/gruposConsumo', 'GrupoConsumoController@listar');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
