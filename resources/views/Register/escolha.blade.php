@extends('layouts/app')
@section('head')
    {{-- <link href="{{ asset('css/index_vagas.css') }}" rel="stylesheet"> --}}
@endsection
@section('content')
<h3>Escolha entre o tipo de cadastro</h3>
<a href="{{route('candidatos.create')}}">Candidato</a> <br>
<a href="{{route('empregadores.create')}}">empregador</a>
@endsection
