@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Itens do Pedido</div>
                <div class="panel-body">
                    <table class="table table-hover">         
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Unidade</th>
                            <th>Preço</th>
                            <th>Preço Total do Item</th>
                        </tr>
                        
                        @foreach ($itensPedido as $itemPedido)
                        <tr>
                            <td>{{ $itemPedido->nome_produto }}</td>
                            <td>{{ $itemPedido->quantidades }}</td>
                            <td>{{ $itemPedido->unidade_venda }}</td>
                            <td>{{ $itemPedido->preco }}</td>
                            <td>{{ $itemPedido->preco * $itemPedido->quantidades }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection