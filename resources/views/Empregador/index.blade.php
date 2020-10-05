@foreach ($empregadores as $empregador)
    <div>{{$empregador}}</div>
    <div>{{$empregador->telefones()->get()}}</div>

@endforeach
<br>
<form method="POST" action="{{route('logout')}}">
    @csrf
    <button type="submit" >
        Logout
    </button>
</form>

