@foreach ($empregadores as $empregador)
    <div>{{$empregador}}</div>
    <div>{{$empregador->telefones()->get()}}</div>

@endforeach