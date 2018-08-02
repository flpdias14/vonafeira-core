@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Novo Evento</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/cadastrarGrupoConsumo">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <input id="email" type="hidden" class="form-control" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('dia_evento') ? ' has-error' : '' }}">
                            <label for="dia_evento" class="col-md-4 control-label">Dia do Evento</label>
                            <div class="col-md-6">
                                <input id="dia_evento" type=date class="form-control" name="dia_evento" value="{{ old('dia_evento') }}" required autofocus>
                                @if ($errors->has('dia_evento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dia_evento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('data_inicio_pedidos') ? ' has-error' : '' }}">
                            <label for="data_inicio_pedidos" class="col-md-4 control-label">Dia de Inicio de Pedidos</label>
                            <div class="col-md-6">
                                <input id="data_inicio_pedidos" type=date class="form-control" name="data_inicio_pedidos" value="{{ old('dia_evento') }}" required autofocus>
                                @if ($errors->has('data_inicio_pedidos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_inicio_pedidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('data_fim_pedidos') ? ' has-error' : '' }}">
                            <label for="data_fim_pedidos" class="col-md-4 control-label">Dia de fim de Pedidos</label>
                            <div class="col-md-6">
                                <input id="data_fim_pedidos" type=date class="form-control" name="data_fim_pedidos" value="{{ old('dia_evento') }}" required autofocus>
                                @if ($errors->has('data_fim_pedidos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_fim_pedidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection