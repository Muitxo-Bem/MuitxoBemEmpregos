@extends('layouts/app')
@section('head')
    <link href="{{ asset('css/create_vagas.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="jumbotron " id='jumbotron'>
    <h2 class="display-5">Cadastro de Vagas</h2>
<div>
    <form action="{{route('vagas.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for='nome' class="col-md-2 col-form-label">Nome da Vaga</label>
            <div class="col-md-6">
                <input type='text' class="form-control @error('nome') is-invalid @enderror" placeholder = "Digite o Nome da Vaga" name='nome' id='nome' value="{{old('nome')}}"/>    
                @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for='descricao' class="col-md-1 col-form-label">Descrição</label>
            <div class="col-md-6">
                <input type='text' class="form-control @error('descricao') is-invalid @enderror" placeholder = "Digite a descrição da vaga" name='descricao' id='descricao' value="{{old('descricao')}}"/>    
                @error('descricao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for='quantidade_de_vagas' class="col-md-2 col-form-label">Quantidade de Vagas</label>
            <div class="col-md-6">
                <input type='text' class="form-control @error('quantidade_de_vagas') is-invalid @enderror" placeholder = "Digite a Quantidade de Vagas" name='quantidade_de_vagas' id='quantidade_de_vagas' value="{{old('quantidade_de_vagas')}}"/>    
                @error('quantidade_de_vagas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for='local_de_trabalho' class="col-md-2 col-form-label">Local de Trabalho</label>
            <div class="col-md-6">
                <input type='text' class="form-control @error('local_de_trabalho') is-invalid @enderror" placeholder = "Digite o Local de Trabalho" name='local_de_trabalho' id='local_de_trabalho' value="{{old('local_de_trabalho')}}"/>    
                @error('local_de_trabalho')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for='requisitos' class="col-md-1 col-form-label">Requisitos</label>
            <div class="col-md-6">
                <input type='text' class="form-control @error('requisitos') is-invalid @enderror" placeholder = "Digite os Requisitos" name='requisitos' id='requisitos' value="{{old('requisitos')}}"/>    
                @error('requisitos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for='faixa_salarial' class="col-md-2 col-form-label">Faixa Salarial</label>
            <div class="col-md-6">
                <input type='text' class="form-control @error('faixa_salarial') is-invalid @enderror" placeholder = "Digite a Faixa Salarial" name='faixa_salarial' id='faixa_salarial' value="{{old('faixa_salarial')}}"/>    
                @error('faixa_salarial')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for='diferenciais' class="col-md-1 col-form-label">Diferenciais</label>
            <div class="col-md-6">
                <input type='text' class="form-control @error('diferenciais') is-invalid @enderror" placeholder = "Digite os Diferenciais" name='diferenciais' id='diferenciais' value="{{old('diferenciais')}}"/>    
                @error('diferenciais')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-lg btn-outline-info btn-block">
            Cadastrar
        </button>
    </form>
</div>
</div>

@endsection

