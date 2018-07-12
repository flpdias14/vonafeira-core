<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Editar Unidade de Venda</title>

    </head>
    <body>
    	<h1>Edição de Unidade de Venda</h1>
    	
    	<form action="atualizarUnidadeVenda" method="post"> 
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id" value="{{ $unidadeVenda->id }}" />
                Nome: <input type="text" name="nome" value="{{$unidadeVenda->nome}}"required><br/>
    			Descrição: <input type="text" name="descricao" value="{{$unidadeVenda->descricao}}" required><br/>
                Permitir Fracionamento: <select name="is_fracionado">
  					<option value="" selected disabled hidden>Selecionar</option>
 					<option value="1">Sim</option>
					<option value="0">Não</option>
				</select><br/>
				Permitir Porções: <select name="is_porcao">
  					<option value="" selected disabled hidden>Selecionar</option>
 					<option value="1">Sim</option>
					<option value="0">Não</option>
				</select><br/>
    			<input  type="submit" value="atualizar" />
    	</form>
    </body> 
</html>