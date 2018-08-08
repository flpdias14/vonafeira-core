@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Produtos</div>
                    <table class="table table-hover">  
                        <form class="form-horizontal" method="POST" action="/adicionarPedido">       
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Unidade de Venda</th>
                                <th>Quantidade</th>
                            </tr>
                            
                            @for ($i = 0; $i < count($array_of_item_ids); $i++)

                            <tr>
                                <td>{{ $array_of_item_ids[i] }}</td>                                                                 
                            </tr>
                            
                            @endfor
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection