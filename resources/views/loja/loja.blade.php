@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Produtos</div>
                <form class="form-horizontal" method="POST" action="{{action('PedidoController@confirmar')}}">     
                    <div class="panel-body">
                        @if(count($produtos) == 0)
                        <div class="alert alert-danger">
                                Não existem produtos disponíveis no momento.
                        </div>
                        @else
                          
                            {{ csrf_field() }}
                            <table class="table table-hover"> 
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Unidade de Venda</th>
                                    <th>Quantidade</th>
                                </tr>
                            
                                @for ($i = 0; $i < count($produtos); $i++)
                                <input id="item_id" type="hidden" class="form-control" name="item_id[{{$i}}]" value="{{ $produtos[$i]->id }}" required autofocus>
                                <tr>
                                    <td>{{ $produtos[$i]->nome }}</td> 
                                    
                                    <td>{{ $produtos[$i]->descricao }}</td>
                                    <td>{{ $produtos[$i]->preco }}</td>
                                    <td>{{ $produtos[$i]->unidadeVenda->nome }}</td>
                                    @if(($produtos[$i]->unidadeVenda->is_fracionado) == 1)
                                        <td><input id="quantidade" type="number" min="1" step="0.1" class="form-control" name="quantidade[{{$i}}]" value="{{ old('quantidade') }}" required autofocus></td>
                                    @else
                                        <td><input id="quantidade" type="number" min="1" step="1" class="form-control" name="quantidade[{{$i}}]" value="{{ old('quantidade') }}" required autofocus></td>
                                    @endif
        
                                </tr>
                                
                                @endfor
                            </table>
                        @endif
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-13">
                                <button type="submit" class="btn btn-primary">
                                    Adicionar ao Carrinho
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection