@foreach ($enderecos as $endereco)
    <div>{{$endereco}}</div>
    <div>{{$endereco->dono()->get()}}</div>
@endforeach