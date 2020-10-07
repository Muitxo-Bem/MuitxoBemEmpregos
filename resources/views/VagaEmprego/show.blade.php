@extends('layouts/app')
@section('head')
    <link href="{{ asset('css/show_vagas.css') }}" rel="stylesheet">
@endsection
@section('content')
<h3 id='nome'>{{$vaga->nome}}</h3>

<div class="jumbotron " id='jumbotron'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h3>
                    Faixa Salarial
                </h3>
                <p>
                    R$: {{$vaga->faixa_salarial}}
                </p>
            </div>
            <div class="col-md-4">
                <h3>
                    Local de Trabalho
                </h3>
                <p>
                    {{$vaga->local_de_trabalho}}
                </p>
            </div>
            <div class="col-md-4">
                <h3>
                    Quantidade de Vagas
                </h3>
                <p>
                    {{$vaga->quantidade_de_vagas}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>
                    Descrição
                </h3>
                <p>
                    {{$vaga->descricao}}
                </p>
                <h3>
                    Requisitos
                </h3>
                <p>
                    {{$vaga->requisitos}}                
                </p>
                <h3>
                    Diferenciais
                </h3>
                <p>
                    {{$vaga->diferenciais}}
                </p>
            </div>
            <div class="col-md-6">
                <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" />
                <h3>
                    Informações do Empregador
                </h3>
                <p>
                    {{$vaga->empregador->nome}}
                    <h5>Email</h5>
                    <p>
                    {{$vaga->empregador->email}}
                    </p>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 {{-- Fazer Ação de se candidatar pra vaga, precisa ter o login
                    do candidato, e pegar ele na sessão, decrementar quantidade de vagas
                    --}}
                <button type="button" class="btn btn-lg btn-outline-info btn-block">
                    Candidatar-se
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
