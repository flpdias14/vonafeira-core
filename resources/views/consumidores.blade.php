@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Consumidores</div>

                <div class="panel-body">
                <table class="table table-hover">
                    
                    <tr>
                        <th>Cod</th>
                        <th>Usuário</th>
                        <th>Grupo de Consumo</th>
                    </tr>
                    
                    @foreach ($consumidores as $consumidor)
                    <tr>
                        <td>{{ $consumidor->id }}</td>
                        <td>{{ $consumidor->consumidor_id }}</td>
                        <td>{{ $consumidor->grupoconsumo_id }}</td> 
                    </tr>

                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection