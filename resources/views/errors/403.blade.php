@extends('layouts/app')
@section('head')
@endsection

@section('content')
<div class="jumbotron " id='jumbotron'>
    <h2>Você não está autorizado a visualizar essa página</h2>
    <button type="button" class="btn btn-secondary"
        onclick ="window.history.back()"
    >Voltar</button>
    
</div>
@endsection