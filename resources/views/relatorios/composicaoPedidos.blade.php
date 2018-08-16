<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/relatorios.css') }}" rel="stylesheet">
    <title>Relatório de Composição de Pedidos</title>
</head>
<body>
    <h3>Relatório de Composição de Pedidos - Emitido em {{$date}}</h3>
    @foreach($data as $pedido)
    <strong>Consumidor: </strong> {{$pedido->consumidor->usuario->name}}
    <table>
        <thead>
            <tr>
                <th>PRODUTO</th>
                <th>PRECO</th>
                <th>QUANTIDADE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->itens as $item)
            <tr>
                <th>{{$item->nome_produto}}</th>
                <th>{{$item->preco}}</th>
                <th>{{$item->quantidades}}</th>
            </tr>
            @endforeach
        </tbody>
    
    
    </table>

    <br>
    @endforeach
</body>
</html>