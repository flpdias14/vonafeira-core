@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Eventos</h1></div>
                    @if(old('data_evento'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong>
                            O evento o foi adicionado.
                        </div>
                    @endif
                    @if(session('warning'))
                        <div class="alert alert-danger">
                            <strong>Aviso!</strong>
                            {{session('warning')}}
                        </div>
                    @endif
                <div class="panel-body">
                    @if(count($eventos) == 0)
                        <div class="alert alert-danger">
                                Não existem eventos cadastrados.
                        </div>
                    @else
                    <table class="table table-hover">
                        
                        <tr>
                            <th>Cod</th>
                            <th>Data Evento</th>
                            <th>Hora Evento</th>
                            <th>Data Inicio Pedidos</th>
                            <th>Data Fim Pedidos</th>
                            <th>Pedidos</th>
                            
                        </tr>
                        
                        @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->data_evento }}</td>
                            <td>{{ $evento->hora_evento }}</td>
                            <td>{{ $evento->data_inicio_pedidos }}</td>
                            <td>{{ $evento->data_fim_pedidos }}</td>
                            <td><a class="btn btn-info" href="{{action('PdfController@criarRelatorioComposicaoPedidos', $evento->id)}}">Visualizar</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="panel-footer">
                    <a class="btn btn-success" href="{{action('EventoController@novo', $grupoConsumo)}}">Novo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection