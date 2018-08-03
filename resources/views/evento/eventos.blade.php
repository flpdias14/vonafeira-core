@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Eventos</div>

                <div class="panel-body">
                <table class="table table-hover">
                    
                    <tr>
                        <th>Cod</th>
                        <th>Data Evento</th>
                        <th>Hora Evento</th>
                        <th>Data Inicio Pedidos</th>
                        <th>Data Fim Pedidos</th>
                        
                    </tr>
                    
                    @foreach ($eventos as $evento)
                    <tr>
                        <td>{{ $evento->id }}</td>
                        <td>{{ $evento->data_evento }}</td>
                        <td>{{ $evento->hora_evento }}</td>
                        <td>{{ $evento->data_inicio_pedidos }}</td>
                        <td>{{ $evento->data_fim_pedidos }}</td>
                    </tr>
                        <br/>
                    @endforeach

                    </tbody>
		            <tfoot>
		                
		                <a  class="btn btn-primary" href="/adicionarEvento/1">Novo</a>
		            </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection