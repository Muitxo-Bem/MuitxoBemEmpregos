<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculo Create</title>
</head>

<body>
    <div>
        <form action="{{route('area_formacaos.store')}}" method="POST">
            @csrf
            <div>
                <label for='curriculo_id'>Currículo ID</label>
                <input type='text' name='curriculo_id' id='curriculo_id'>
            </div>
            <div>
                <label for='area'>Área de Formação</label>
                <textarea type='text' name='area' id='area'>
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