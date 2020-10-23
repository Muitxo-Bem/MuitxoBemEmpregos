@extends('layouts/app')
@section('content')
    <div class="container">
        <form action="{{route('curriculos.update', $curriculo)}}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="col-md-10">Atualizar Curriculo</h2>

            <div class="form-group">
                <label for='experiencia' class="col-md-2 col-form-label">Experiência</label>
                <div class="col-md-8">
                <input type='text' class="form-control @error('experiência') is-invalid @enderror" placeholder = "Digite sua expeeriência profissional" name='experiencia' id='experiencia' value="{{$curriculo->experiencia}}"/>    
                    @error('experiencia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='info_adicional' class="col-md-3 col-form-label">Informações Adicionais</label>
                <div class="col-md-8">
                    <input type='text' class="form-control @error('info_adicional') is-invalid @enderror" placeholder = "Digite informações adicionais" name='info_adicional' id='info_adicional' value="{{$curriculo->info_adicional}}"/>     
                    @error('info_adicional')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='idioma' class="col-md-1 col-form-label">Idiomas</label>
                <div class="col-md-8">
                    <input type='text' class="form-control @error('idioma') is-invalid @enderror" placeholder = "Digite os idiomas que você domina" name='idioma' id='idioma' value="{{$curriculo->idiomas()->get()->first()->idioma}}"/>  
                    @error('idioma')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='areaFormacao' class="col-md-3 col-form-label">Área de Formação</label>
                <div class="col-md-8">
                    <input type='areaFormacao' class="form-control @error('areaFormacao') is-invalid @enderror" placeholder = "Digite sua área de formação" name='area' id='area' value="{{$curriculo->areaFormacaos()->get()->first()->area}}"/>   
                    @error('areaFormacao')
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
@endsection('content')