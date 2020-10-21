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
                @if(\Auth::check() and \Auth::user()->tipo == 'candidato')
                 <form action = "{{route('vagas.candidatar',['vaga' => $vaga])}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-outline-info btn-block">
                        Candidatar-se
                    </button>
                </form>
                @elseif(\Auth::check() and \Auth::user()->tipo == 'empregador' and $vaga->ativa == 1)
                    <form action="{{route('vagas.close',[$vaga->id])}}" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-lg btn-outline-info btn-block">
                        Fechar Vaga
                    </button>
                    </form>
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
                                            <td><img id = 'img-vaga' src="https://www.sportsjournalists.co.uk/wp-content/uploads/2016/04/Google-logo-for-featured-pic.jpg" alt="img"></td>
                                            <td class='nomeCandidato'><a href="#">{{$candidato->nome}}</a></td>
                                            <td class='nomeCandidato'><a href="#">{{$candidato->curriculo}}</a></td>
                                            <td class='nomeCandidato'><a href="#">{{$candidato->portfolio}}</a></td>
                                        </tr>    
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                @elseif(\Auth::check() and \Auth::user()->tipo == 'empregador' and $vaga->ativa == 0)
                    </form>
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
                                            <td><img id = 'img-vaga' src="https://www.sportsjournalists.co.uk/wp-content/uploads/2016/04/Google-logo-for-featured-pic.jpg" alt="img"></td>
                                            <td class='nomeCandidato'><a href="#">{{$candidato->nome}}</a></td>
                                            <td class='nomeCandidato'><a href="#">{{$candidato->curriculo}}</a></td>
                                            <td class='nomeCandidato'><a href="#">{{$candidato->portfolio}}</a></td>
                                        </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
