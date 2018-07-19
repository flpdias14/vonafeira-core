<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Unidades de Venda</title>
            <style>
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                th, td {
                    padding: 5px;
                    text-align: left;    
                }
            </style>
    </head>
    <body>
    <h2>Unidades de Venda</h2>
    <table style="width:100%">
    <tr>
        <th>Cod</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Fracionado</th>
        <th>Porção</th>
        <th colspan="2">Ação</th>
    </tr>
    
    @foreach ($listaUnidades as $unidadesVenda)
    <tr>
    	<td>{{ $unidadesVenda->id }}</td>
        <td>{{ $unidadesVenda->nome }}</td>
        <td>{{ $unidadesVenda->descricao }}</td>
        <td>{{ ($unidadesVenda->is_fracionado ? "Sim": "Não") }}</td>
        <td>{{ ($unidadesVenda->is_porcao ? "Sim": "Não") }}</td> 
		<td><a href="/editarUnidadeVenda/{{$unidadesVenda->id}}">Editar</a></td>
		<td><a disabled href="">Remover</a></td>    
    </tr>
    	<br/>
    @endforeach
    </table>
 		<a href="/adicionarUnidadeVenda">Novo</a>
    </body>
</html>