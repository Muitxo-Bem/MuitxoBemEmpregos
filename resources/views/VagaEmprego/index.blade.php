@foreach ($vagas as $vaga)
    <div>{{$vaga}}</div>
    <div>{{$vaga->empregador()->get()}}</div>
@endforeach