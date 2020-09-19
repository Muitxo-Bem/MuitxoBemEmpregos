<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidato Create</title>
</head>

<body>
    <div>
        <form action="{{route('empregadores.store')}}" method="POST">
            @csrf
            <div>
                <label for='Nome'>Nome</label>
                <input type='text' name='nome' id='nome'>
            </div>
            <div>
                <label for='cpf'>CPF</label>
                <input type='text' name='cpf' id='cpf'>
            </div>
            <div>
                <label for='email'>Email</label>
                <input type='text' name='email' id='email'>
            </div>
            <div>
                <label for='Senha'>Senha</label>
                <input type='password' name='senha' id='senha'>
            </div>
            
            <button type='submit'>Cadastrar</button>
        </form>
    </div>
</body>

</html>