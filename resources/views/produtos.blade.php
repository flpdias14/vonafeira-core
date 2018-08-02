@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Produtos</div>

                <div class="panel-body">
                <table class="table table-hover">
                    
                    <tr>
                        <th>Cod</th>
                        <th>Nome do Produtor</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Unidade de Venda</th>
                        <th>Grupo de Consumo</th>
                        <th colspan="2">Ação</th>
                    </tr>
                    
                    @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome_produtor }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>{{ $produto->unidadevenda_id }}</td>
                        <td>{{ $produto->grupoconsumo_id }}</td>
                        <td><a class="btn btn-success"href="/editarProduto/{{$produto->id}}">Editar</a></td>
                        <td><a class="btn btn-danger"href="/removerProduto/{{$produto->id}}">Remover</a></td>
                    </tr>
                    
                    @endforeach
                    <tfoot>
		                <a  class="btn btn-primary" href="/adicionarProduto/{{$idGrupoConsumo}}">Novo</a>
		            </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection