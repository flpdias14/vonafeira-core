@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{$grupoConsumo->name}}</h1></div>

                <div class="panel-body">
                <h3>Descrição</h3>
                </br>
                <p>{{$grupoConsumo->descricao}}</p>
                </br>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/editarGrupoConsumo/{{$grupoConsumo->id}}" class="btn btn-primary">Editar Grupo</a> <a href="/produtos/{{$grupoConsumo->id}}" class="btn btn-primary">Produtos</a> <a href="/eventos/{{$grupoConsumo->id}}" class="btn btn-primary">Eventos</a> <a href="/consumidores/{{$grupoConsumo->id}}" class="btn btn-primary">Consumidores</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
