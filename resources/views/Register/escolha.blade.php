@extends('layouts/app')
@section('head')
    <link href="{{ asset('css/escolha_register.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="jumbotron " id='jumbotron'>
    <div class="container-fluid">
        <h3>Escolha o tipo de cadastro</h3>
        <div class='row'>
            <div id ='candidato-button' class='col-md-6'>
                <form action="{{route('candidatos.create')}}" method='GET' >
                    <button type="submit" class="btn btn-primary">Candidato</button>
                </form>
            </div>
            <div id='empregador-button' class="col-md-6">
                <form action="{{route('empregadores.create')}}" method="GET">
                    <button type="submit" class="btn btn-primary">Empregador</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
