@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Consumidores</div>

                <div class="panel-body">
                @if(count($consumidores) == 0)
                    <div class="alert alert-danger">
                            Não existem Consumidores cadastrados.
                    </div>
                @else
                    <table class="table table-hover"> 
                        <tr>
                            <th>Cod</th>
                            <th>Usuário</th>
                            <th>Grupo de Consumo</th>
                        </tr>
                        @foreach ($consumidores as $consumidor)
                        <tr>
                            <td>{{ $consumidor->id }}</td>
                            <td>{{ $consumidor->user_id }}</td>
                            <td>{{ $consumidor->grupo_consumo_id}}</td> 
                        </tr>
                        @endforeach
                    </table>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection