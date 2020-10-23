@extends('layouts/app')
@section('content')
    <div class="container">
        <form action="{{route('portfolios.update', $portfolio)}}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="col-md-10">Atualizar Portfólio</h2>

            <div class="form-group">
                <label for='link' class="col-md-2 col-form-label">Portfólio</label>
                <div class="col-md-6">
                <input type='text' class="form-control @error('portfolio') is-invalid @enderror" name='link' id='link' value="{{$portfolio->portfolio}}"/>    
                    @error('portfolio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            <div class="col-md-4">
                <br>
                <button type='submit' class="btn btn-primary" >Atualizar informações</button>
            </div>
        </form>
    </div>
@endsection('content')