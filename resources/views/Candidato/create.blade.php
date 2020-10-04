<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar candidato</title>
</head>

<body>
    <div>
        <form action="{{route('candidatos.store')}}" method="POST">
            @csrf

            <h1>Informações do candidato</h1>

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

            <div>
                <label for='ConfirmaçãoSenha'>Confirme sua senha</label>
                <input type='password' name='senha_confirmation' id='senha_confirmation'>
            </div>

            <h1>Telefone</h1>

            <div>
                <label for='telefone_primario'>Telefone primário</label>
                <input type='text' name='telefone_primario' id='telefone_primario'>
            </div>
            <div>
                <label for='telefone_secundario'>Telefone secundário</label>
                <input type='text' name='telefone_secundario' id='telefone_secundario'>
            </div>

            <h1>Endereço</h1>

            <div>
                <label for='rua'>Rua</label>
                <input type='text' name='rua' id='rua'>
            </div>
            <div>
                <label for='bairro'>Bairro</label>
                <input type='text' name='bairro' id='bairro'>
            </div>
            <div>
                <label for='numero'>Número</label>
                <input type='text' name='numero' id='numero'>
            </div>
            <div>
                <label for='cep'>CEP</label>
                <input type='text' name='cep' id='cep'>
            </div>
            <div>
                <label for='estado'>Estado</label>
                <input type='text' name='estado' id='estado'>
            </div>
            <div>
                <label for='cidade'>Cidade</label>
                <input type='text' name='cidade' id='cidade'>
            </div>

            <button type='submit'>Cadastrar</button>
        </form>
    </div>
    
    @if($errors->any())
    @foreach ($errors->all() as $item)
        <div>{{$item}}</div>
    @endforeach
    @endif

</body>

</html>