@extends('layouts/app')
@section('head')
    <link href="{{ asset('css/pag_inicial.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="jumbotron " id='jumbotron'>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        Encontre empregos de forma rápida e fácil
                    </h1>
                    <p>
                        A MuitxoBem Empregos te ajuda a encontrar uma vaga que se encaixe nos seus requisitos
                    </p>
                    
                </div>
                <div class="col-md-6">
                    <img src="https://www.magicwebdesign.com.br/blog/wp-content/uploads/2014/12/negocios-exterior-Magic.jpg" width='550' height="360">
                </div>
            </div>
            <div class="row">
                <div id='botao-vagas'class="col-md-6">
                    <form action="{{route('vagas.index')}}" method='GET'>
                        <button type="submit" class="btn btn-primary">Encontre Vagas</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection