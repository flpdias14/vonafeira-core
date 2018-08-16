@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pedidos</div>
                <div class="panel-body">
                    @if(count($pedidos) == 0)
                        <div class="alert alert-danger">
                            Não existem pedidos cadastrados.
                        </div>
                    @else
                    <table class="table table-hover">         
                        <tr>
                            <th>Cod</th>
                            <th>Consumidor</th>
                            <th>Número de Itens</th>
                            <th>Total</th>
                            <th>Data</th>
                            <th colspan="2">Ações</th>
                        </tr>
                        
                        @for ($i=0; $i < count($pedidos); $i++)
                        <tr>
                            <td>{{ $pedidos[$i]->id }}</td>
                            <td>{{ $pedidos[$i]->consumidor->usuario->name }}</td>
                            <td>{{ $totaisItens[$i] }}</td>
                            <td>{{ $totaisPedidos[$i] }}</td>
                            <td>{{ $pedidos[$i]->data_pedido }}</td>
                            <td><a class="btn btn-info" href="{{action('EventoController@itensPedido', $pedidos[$i]->id)}}">Itens</a></td>
                        </tr>
                        @endfor
                    </table>
                    @endif
                </div>
                <div class="panel-footer">
                    <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection