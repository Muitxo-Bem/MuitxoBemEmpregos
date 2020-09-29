<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidato Create</title>
</head>

<body>
    <div>
        <form action="{{route('vagas.store')}}" method="POST">
            @csrf
            <div>
                <label for='empregador_id'>empregador</label>
            <input type='text' name='empregador_id' id='empregador_id' value="{{old('empregador_id')}}">
            </div>
            <div>
                <label for='nome'>nome</label>
                <input type='text' name='nome' id='nome' value="{{old('nome')}}">
            </div>
            <div>
                <label for='descricao'>descricao</label>
                <input type='text' name='descricao' id='descricao' value="{{old('descricao')}}">
            </div>
            <div>
                <label for='quantidade_de_vagas'>Quantidade de Vagas</label>
                <input type='text' name='quantidade_de_vagas' id='quantidade_de_vagas' value="{{old('quantidade_de_vagas')}}">
            </div>
            <div>
                <label for='local_de_trabalho'>Local de Trabalho</label>
                <input type='text' name='local_de_trabalho' id='local_de_trabalho' value="{{old('local_de_trabalho')}}">
            </div>
            <div>
                <label for='requisitos'>Requisitos</label>
                <input type='text' name='requisitos' id='requisitos' value="{{old('requisitos')}}">
            </div>
            <div>
                <label for='faixa_salarial'>Faixa Salarial</label>
                <input type='text' name='faixa_salarial' id='faixa_salarial' value="{{old('faixa_salarial')}}">
            </div>
            <div>
                <label for='diferenciais'>Diferenciais</label>
                <input type='text' name='diferenciais' id='diferenciais' value="{{old('diferenciais')}}">
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