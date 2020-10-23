@extends('layouts/app')
@section('head')
    <link href="{{ asset('css/show_vagas.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-6'>
            <h3 id='nome'>{{$vaga->nome}}</h3>
        </div>
        @can('update',$vaga)
        <div class='col-md-6' id='editar'>
            <form action="{{route('vagas.edit',['vaga' => $vaga->id])}}" method="GET"> 
                <button type="submit" class="btn btn-secondary">Editar Vaga</button>
            </form>
        </div>
        @endcan
    </div>
</div>
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
                <h3>
                    Informações do Empregador
                </h3>
                <p>
                    {{$vaga->empregador->nome}}
                    <h5>Email</h5>
                    <p>
                    {{$vaga->empregador->user->email}}
                    </p>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(!\Auth::check())
                 <form action = "{{route('vagas.candidatar',['vaga' => $vaga])}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-outline-info btn-block">
                        Candidatar-se
                    </button>
                </form>
                @endif
                @can('candidatar',$vaga)
                <form action = "{{route('vagas.candidatar',['vaga' => $vaga])}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-outline-info btn-block">
                        Candidatar-se
                    </button>
                </form>
                @endcan
                @can('close',$vaga)
                    <form action="{{route('vagas.close',[$vaga->id])}}" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-lg btn-outline-info btn-block">
                        Fechar Vaga
                    </button>
                    </form>
                @endcan
                @can('verAplic',$vaga)
                    <div class='row'>
                        <div class='col-md-12'>
                            <h2 class="my-2">Aplicações</h2>
                            <table class="table">
                                <thead class="black white-text">
                                  <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nome do Candidato</th>
                                    <th scope="col">Currículo</th>
                                    <th scope="col">Portfólio</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vaga->aplicacoes()->get() as $candidato)
                                        <tr class='vaga'>
                                            <td><img id = 'img-vaga' src="https://image.freepik.com/vetores-gratis/fundo-de-vaga-de-emprego-na-mao-desenhada-estilo_23-2147867567.jpg" alt="img"></td>
                                            <td class='nomeCandidato'><a href="{{route('candidatos.show',$candidato->id)}}">{{$candidato->nome}}</a></td>
                                            @if(!is_null($candidato->curriculo))
                                            <td class='nomeCandidato'><a href="{{route('curriculos.show',$candidato->curriculo->id)}}">{{$candidato->curriculo}}</a></td>
                                            @else
                                            <td class='nomeCandidato'><p href="#">Sem Currículo</p></td>
                                            @endif
                                            @if(!is_null($candidato->portfolio))
                                            <td class='nomeCandidato'><a href="{{route('portfolios.show',$candidato->portfolio->id)}}">{{$candidato->portfolio}}</a></td>
                                            @else
                                            <td class='nomeCandidato'><p href="">Sem Portfólio</p></td>

                                            @endif
                                        </tr>    
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                @endcan
                
            </div>
        </div>
    </div>
</div>
@endsection
