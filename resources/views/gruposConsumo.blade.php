@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Grupos de Consumo</div>

                <div class="panel-body">
                <table class="table table-hover">
                    
                    <tr>
                        <th>Cod</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Período</th>
                        <th>Primeiro Evento</th>
                        <th>Dia limite para pedidos</th>
                        <th colspan="2">Ação</th>
                    </tr>
                    
                    @foreach ($gruposConsumo as $grupoConsumo)
                    <tr>
                        <td>{{ $grupoConsumo->id }}</td>
                        <td>{{ $grupoConsumo->name }}</td>
                        <td>{{ $grupoConsumo->descricao }}</td>
                        <td>{{ $grupoConsumo->periodo }}</td>
                        <td>{{ $grupoConsumo->dia_semana }}</td>
                        <td>{{ $grupoConsumo->prazo_pedidos }}</td>
                        <td><a href="/editarGrupoConsumo/{{$grupoConsumo->id}}">Editar</a></td> 

                    </tr>

                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection