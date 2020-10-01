@foreach ($curriculos as $curriculo)
    <div>{{$curriculo}}</div>
    <div>{{$curriculo->dono()->get()}}</div>
@endforeach