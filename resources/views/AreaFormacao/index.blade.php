@foreach ($area_formacaos as $area_formacao)
    <div>{{$area_formacao}}</div>
    <div>{{$area_formacao->dono()->get()}}</div>
@endforeach