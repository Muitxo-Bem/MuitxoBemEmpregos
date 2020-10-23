@extends('layouts/app')
@section('head')
<link href="{{ asset('css/sobre.css') }}" rel="stylesheet">

@endsection
@section('content')
<div class="jumbotron " id='jumbotron'>
    <h2>Muitxo Bem</h2>
    <div class="container-fluid" id='inside'>
        <div class="row">
            <div class="col-md-3">
                <img class='foto'src='https://github.com/ErikJhonatta.png' alt='Erik'>
                <h4><a href="https://github.com/ErikJhonatta">Erik Jhonatta</a></h4>
            </div>
            <div class="col-md-3">
                <img class='foto'src='https://github.com/BASDiniz.png' alt='Bruno'>
                <h4><a href="https://github.com/BASDiniz">Bruno Diniz</a></h4>
            </div>
            <div class="col-md-3">
                <img class='foto'src='https://github.com/davidbr1to.png' alt='David'>
                <h4><a href='https://github.com/davidbr1to'>David Brito</a></h4>
            </div>
            <div class="col-md-3">
                <img class='foto'src='https://github.com/IsaacBraga.png' alt='Isaac'>
                <h4><a href="https://github.com/IsaacBraga">Isaac Braga</a></h4>
            </div>
        </div>
    </div>
    
</div>
@endsection