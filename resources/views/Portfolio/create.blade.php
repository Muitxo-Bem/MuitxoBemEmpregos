<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Create</title>
</head>

<body>
    <div>
        <form action="{{route('portfolios.store')}}" method="POST">
            @csrf
            <div>
                <label for='link'>Link</label>
                <input type='text' name='link' id='link'>
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