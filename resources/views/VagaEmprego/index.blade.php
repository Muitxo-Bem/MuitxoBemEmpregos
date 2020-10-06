@extends('layouts/app')

@section('content')
<div class="form-group has-search" id="search-bar">
    <span class="fa fa-search form-control-feedback" id='search-icon'></span>
    <input type="text" class="form-control" placeholder="Search">
</div>
{{-- @foreach ($vagas as $vaga)
    <div>{{$vaga}}</div>
    <div>{{$vaga->empregador()->get()}}</div>
@endforeach --}}
@endsection
