<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Cadastrar Nova Unidade de Venda</title>

    </head>
    <body>
    	<h1>Cadastro Unidade de Venda</h1>
    	
    	<form action="cadastrarUnidadeVenda" method="post"> 
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                Nome: <input type="text" name="nome" required><br/>
    			Descrição: <input type="text" name="descricao" required><br/>
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
    			<input  type="submit" value="cadastrar" />
    	</form>
    </body>
</html>