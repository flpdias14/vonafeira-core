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

// Rotas para Unidade de Vendas
Route::get('/unidadesVenda', "UnidadeVendaController@listar");
Route::get('/adicionarUnidadeVenda', "UnidadeVendaController@adicionar");
Route::get('/editarUnidadeVenda/{id}', "UnidadeVendaController@editar");
Route::post('/cadastrarUnidadeVenda', "UnidadeVendaController@cadastrar");
Route::post('/atualizarUnidadeVenda', "UnidadeVendaController@atualizar");

Route::get('/erroCadastroExiste', function () {
    return "<h1>Não foi possível realizar o cadastro, já existe um registro com este nome.</h1>";
});

// Rotas para Produtos
Route::post('/cadastrarProduto', 'ProdutoController@cadastrar');
Route::get('/editarProduto/{id}', 'ProdutoController@editar');
Route::get('/adicionarProduto/{id}',  'ProdutoController@adicionar');
Route::get('/removerProduto/{id}',  'ProdutoController@remover');
Route::post('/atualizarProduto', "ProdutoController@atualizar");
Route::get('/produtos/{id}', 'ProdutoController@listar');

// Rotas para Consumidor
Route::post('/cadastrarConsumidor', 'ConsumidorController@cadastrar');
Route::get('/adicionarConsumidor',  'ConsumidorController@adicionar');
Route::get('/consumidores/{id}', 'ConsumidorController@listar');

// Rotas para Grupo de Consumo
Route::post('/cadastrarGrupoConsumo', 'GrupoConsumoController@cadastrar');
Route::get('/editarGrupoConsumo/{id}', 'GrupoConsumoController@editar');
Route::get('/adicionarGrupoConsumo',  'GrupoConsumoController@adicionar');
Route::get('/gerenciar/{id}', 'GrupoConsumoController@gerenciar');
Route::post('/atualizarGrupoConsumo', "GrupoConsumoController@atualizar");
Route::post('/salvarGrupoConsumo',  'GrupoConsumoController@salvar');
Route::get('/gruposConsumo', 'GrupoConsumoController@listar');

// Rotas para Eventos
Route::post('/cadastrarEvento', 'EventoController@cadastrar');
Route::get('/editarEvento/{id}', 'EventoController@editar');
Route::get('/adicionarEvento/{idGrupoConsumo}',  'EventoController@adicionar');
Route::post('/salvarEvento',  'EventoController@salvar');
Route::get('/eventos/{id}', 'EventoController@listar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
