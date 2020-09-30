@foreach ($portfolios as $portfolio)
    <div>{{$portfolio}}</div>
    <div>{{$portfolio->dono()->get()}}</div>
    <br>
@endforeach