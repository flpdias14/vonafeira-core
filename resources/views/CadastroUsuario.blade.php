<<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1> Cadastrar Usuário</h1>
    <form action="/adicionar/usuario" method="post">
    <input type="hidden" name="_token" value="{{ csrl_token() }}">
        Nome: <input type="text" name="name" />
        Email: <input type="email" name="email" />
        Senha: <input type="password" name="password" />
        <input type="submit" value="cadastrar" />
    </form>
</body>
</html>