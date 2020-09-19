@foreach ($telefones as $telefone)
    <div>{{$telefone}}</div>
    <div>{{$telefone->dono()->get()}}</div>
@endforeach