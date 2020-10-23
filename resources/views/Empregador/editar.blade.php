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
    <div class="container">
        <form action="{{route('empregadores.update', ['empregadore' => $empregador->id])}}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="col-md-10">Atualizar informações do empregador</h1>
            <h2 class="col-md-6">Informações do empregador</h2>

            <div class="form-group">
                <label for='nome' class="col-md-1 col-form-label">Nome</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('nome') is-invalid @enderror" placeholder = "Digite seu nome" name='nome' id='nome' value="{{$empregador->nome}}"/>
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='cpf' class="col-md-1 col-form-label">CPF</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('cpf') is-invalid @enderror" placeholder = "Digite seu CPF" name='cpf' id='cpf' value="{{$empregador->cpf}}" readonly/>
                    @error('cpf')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='email' class="col-md-1 col-form-label">Email</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('email') is-invalid @enderror" placeholder = "Digite seu email" name='email' id='email' value="{{$empregador->user->email}}"/>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='Senha' class="col-md-1 col-form-label">Senha</label>
                <div class="col-md-6">
                    <input type='password' class="form-control @error('senha') is-invalid @enderror" placeholder = "Digite sua senha" name='senha' id='senha'/>
                    @error('senha')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for='ConfirmaçãoSenha' class="col-md-3 col-form-label">Confirme sua senha</label>
                <div class="col-md-6">
                    <input type='password' class="form-control @error('senha_confirmation') is-invalid @enderror" placeholder = "Digite sua senha novamente" name='senha_confirmation' id='senha_confirmation'/>
                    @error('senha_confirmation')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <h2 class="col-md-1">Telefone</h2>

            <div class="form-group">
                <label for='telefone_primario' class="col-md-3 col-form-label">Telefone primário</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('telefone_primario') is-invalid @enderror" placeholder = "Digite seu telefone primário" name='telefone_primario' id='telefone_primario' value="{{$empregador->telefones()->get()->first()->telefone_primario}}"/>
                    @error('telefone_primario')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='telefone_secundario' class="col-md-3 col-form-label">Telefone secundário</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('telefone_secundario') is-invalid @enderror" placeholder = "Digite seu telefone secundário (opcional)" name='telefone_secundario' id='telefone_secundario' value="{{$empregador->telefones()->get()->first()->telefone_secundario}}"/>
                    @error('telefone_secundario')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <button type='submit' class="btn btn-primary" >Atualizar informações</button>
            </div>

        </form>
    </div>

    </body>

    </html>

@endsection