<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidato Create</title>
</head>

<body>
    <div>
        <form action="{{route('telefones.store')}}" method="POST">
            @csrf
            <div>
                <label for='empregador_id'>empregador</label>
                <input type='text' name='empregador_id' id='empregador_id'>
            </div>
            <div>
                <label for='candidato_id'>Candidato</label>
                <input type='text' name='candidato_id' id='candidato_id'>
            </div>
            <div>
                <label for='telefone_primario'>TPrimario</label>
                <input type='text' name='telefone_primario' id='telefone_primario'>
            </div>
            <div>
                <label for='telefone_secundario'>TSecundario</label>
                <input type='text' name='telefone_secundario' id='telefone_secundario'>
            </div>
            
            <button type='submit'>Cadastrar</button>
        </form>
        @if($errors->any())
        @foreach ($errors->all() as $item)
            <div>{{$item}}</div>
        @endforeach
        @endif
    </div>
</body>

</html>