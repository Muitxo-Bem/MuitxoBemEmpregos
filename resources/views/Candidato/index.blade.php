@foreach ($candidatos as $candidato)
    <div>{{$candidato}}</div>
    <br>
    <div>{{$candidato->telefones()->get()}}</div>
    <br>
    <div>{{$candidato->endereco()->get()}}</div>
    <br>
    <h1>Vagas</h1>
    <br>
    {{$aplicacoes = $candidato->vagaEmpregos()->get()}}

@endforeach
