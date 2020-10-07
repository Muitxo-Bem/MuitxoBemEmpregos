<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculo Create</title>
</head>

<body>
    <div>
        <form action="{{route('curriculos.store')}}" method="POST">
            @csrf
            <div>
                <label for='candidato_id'>Candidato ID</label>
                <textarea type='text' name='candidato_id' id='candidato_id'>
                </textarea>
            </div>
            <div>
                <label for='info_adicional'>Informação Adicional</label>
                <textarea type='text' name='info_adicional' id='info_adicional'>
                </textarea>
            </div>
            <div>
                <label for='experiencia'>Experiência</label>
                <textarea type='text' name='experiencia' id='experiencia'>
                </textarea>
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