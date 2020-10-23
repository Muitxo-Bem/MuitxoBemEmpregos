@extends('layouts/app')

@section('content')
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Candidato</title>
        <link rel="stylesheet" href="{{asset('css/show_vagas.css')}}">
    </head>
    <body>
        <div class="col-md-8">
            <h1>Bem vindo {{$candidato->nome}}</h1> {{--{{$candidato->nome}} Mostrar o nome do usuário após ser cadastrado ou logado no sistema--}}
        </div>
        
        <div class = 'jumbotron' id='jumbotron'>
            @can('adicionarCurriculoCheck', $candidato)
                <div class="col-md-4">
                    <a class="btn btn-success" href="{{route('curriculos.create', $candidato)}}" role="button">Adicionar Curriculo</a>
                </div>
            @endcan

            @can('verCurriculoCheck', $candidato)
                <div class="col-md-4">
                    <a class="btn btn-success" href="{{route('curriculos.show', $candidato->curriculo->id)}}" role="button">Ver Curriculo</a>
                </div>
            @endcan

            @can('adicionarPortfolioCheck', $candidato)
                <div class="col-md-4">
                    <a class="btn btn-success" href="{{route('portfolios.create', $candidato)}}" role="button">Adicionar Portfólio</a>
                </div>
            @endcan

            @can('verPortfolioCheck', $candidato)
                <div class="col-md-4">
                    <a class="btn btn-success" href="{{route('portfolios.show', $candidato->portfolio->id)}}" role="button">Ver Portfólio</a>
                </div>
            @endcan

            @can('update', $candidato)
                <div class="col-md-4">
                    <a class="btn btn-primary" href="{{route('candidatos.edit', $candidato)}}" role="button">Editar Perfil</a>
                </div>
            @endcan

            {{-- @can('apagarCandidato', $candidato)
                <div class="col-md-4">
                    <a class="btn btn-danger" href="{{route('candidatos.destroy', $candidato)}}" role="button">Apagar Perfil</a>
                </div>
            @endcan --}}
        </div>

        <div class="jumbotron " id='jumbotron'>
            <h2 class="display-5">Contatos</h2>
            <table class="table">
                <thead class="black white-text">
                  <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone primário</th>
                    <th scope="col">Telefone secundário</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class= 'info'>
                        <td class='emailCandidato'>{{$candidato->user->email}}</td>
                        <td class='telefonePrimarioCandidato'>{{$candidato->telefones()->get()->first()->telefone_primario}}</td>
                        <td class='telefoneSecundarioCandidato'>{{$candidato->telefones()->get()->first()->telefone_secundario}}</td>
                    </tr>
                </tbody>
              </table>
        </div>

        <div class="jumbotron " id='jumbotron'>
            <h2 class="display-5">Vagas que me candidatei</h2>
            <table class="table">
                <thead class="black white-text">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome da Vaga</th>
                    <th scope="col">Nome do Empregador</th>
                    <th scope="col">Local de Trabalho</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($candidato->vagaEmpregos as $vaga)
                    @if ($vaga->ativa != 0)
                        <tr class='vaga'>
                            <td><img id = 'img-vaga' src="https://www.sportsjournalists.co.uk/wp-content/uploads/2016/04/Google-logo-for-featured-pic.jpg" alt="img"></td>
                            <td class='nomeVaga'><a href="{{route('vagas.show',['vaga' => $vaga->id])}}">{{$vaga->nome}}</a></td>
                            <td class='nomeEmpregador'>{{$vaga->empregador->nome}}</td>
                            <td class='localVaga'>{{$vaga->local_de_trabalho}}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
              </table>
            </div>
    </body>
    </html>
@endsection