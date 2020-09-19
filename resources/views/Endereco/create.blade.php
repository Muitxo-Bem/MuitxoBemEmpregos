<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endereço Create</title>
</head>

<body>
    <div>
        <form action="{{route('enderecos.store')}}" method="POST">
            @csrf
            <div>
                <label for='bairro'>bairro</label>
                <input type='text' name='bairro' id='bairro'>
            </div>
            <div>
                <label for='numero'>numero</label>
                <input type='text' name='numero' id='numero'>
            </div>
            <div>
                <label for='cep'>cep</label>
                <input type='text' name='cep' id='cep'>
            </div>
            <div>
                <label for='estado'>estado</label>
                <input type='text' name='estado' id='estado'>
            </div>
            <div>
                <label for='cidade'>cidade</label>
                <input type='text' name='cidade' id='cidade'>
            </div>
            <div>
                <label for='estado'>rua</label>
                <input type='text' name='rua' id='rua'>
            </div>
            <div>
                <label for='candidato_id'>Candidato</label>
                <input type='text' name='candidato_id' id='candidato_id'>
            </div>
            
            <button type='submit'>Cadastrar</button>
        </form>
    </div>
</body>

</html>