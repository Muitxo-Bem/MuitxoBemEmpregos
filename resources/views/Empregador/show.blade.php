@extends('layouts/app')

@section('content')

<!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Empregador</title>
        <link rel="stylesheet" href="{{asset('css/show_vagas.css')}}">
    </head>
    <body>

        <div class="col-md-8">
            <h1>Bem vindo {{$empregador->nome}}</h1>
        </div>

        <div class = 'jumbotron' id='jumbotron'>
            @can('vagaEmpregoCheck', $empregador)
                <div class="col-md-4">
                    <a class="btn btn-primary" href="{{route('vagas.create', $empregador)}}" role="button">Cadastrar vaga</a>
                </div>
            @endcan

            {{-- @can('listarVagasCheck', $empregador)
                <div class="col-md-4">
                    <a class="btn btn-primary" href="#" role="button">Listar vagas cadastradas</a>
                </div>
            @endcan --}}
            
            @can('update', $empregador)
                <div class="col-md-4">
                    <a class="btn btn-success" href="{{route('empregadores.edit', $empregador)}}" role="button">Editar Perfil</a>
                </div>
            @endcan

            {{-- <div class="col-md-4">
                <a class="btn btn-danger" href="#" role="button">Apagar Perfil</a>
            </div> --}}
        </div>

        <div class="jumbotron " id='jumbotron'>
            <h2 class="display-5">Vagas que postei</h2>
            <table class="table">
                <thead class="black white-text">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome da Vaga</th>
                    {{-- <th scope="col">Nome do Empregador</th> --}}
                    <th scope="col">Local de Trabalho</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($empregador->vagas as $vaga)
                    @if ($vaga->ativa != 0)
                        <tr class='vaga'>
                            <td><img id = 'img-vaga' src="https://www.sportsjournalists.co.uk/wp-content/uploads/2016/04/Google-logo-for-featured-pic.jpg" alt="img"></td>
                            <td class='nomeVaga'><a href="{{route('vagas.show',['vaga' => $vaga->id])}}">{{$vaga->nome}}</a></td>
                            {{-- <td class='nomeEmpregador'>{{$vaga->empregador->nome}}</td> --}}
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