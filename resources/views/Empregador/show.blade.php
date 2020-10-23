@extends('layouts/app')

@section('content')

<!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Empregador</title>
        
    </head>
    <body>

        <div class="col-md-8">
            <h1>Bem vindo {{$empregador->nome}}</h1>
        </div>

        @can('vagaEmpregoCheck', $empregador)
            <div class="col-md-4">
                <a class="btn btn-primary" href="{{route('vagas.create', $empregador)}}" role="button">Cadastrar vaga</a>
            </div>
        @endcan

        @can('listarVagasCheck', $empregador)
            <div class="col-md-4">
                <a class="btn btn-primary" href="#" role="button">Listar vagas cadastradas</a>
            </div>
        @endcan
        
        @can('update', $empregador)
            <div class="col-md-4">
                <a class="btn btn-success" href="{{route('empregadores.edit', $empregador)}}" role="button">Editar Perfil</a>
            </div>
        @endcan

        {{-- <div class="col-md-4">
            <a class="btn btn-danger" href="#" role="button">Apagar Perfil</a>
        </div> --}}
    </body>
    </html>
@endsection