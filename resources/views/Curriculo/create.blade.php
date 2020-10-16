<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Cadastrar Curriculo</title>
</head>

 <body>
 <div class="container">
        <form action="{{route('curriculos.store')}}" method="POST">
            @csrf
            <h1 class="col-md-1">Currículo</h1>
            <h2 class="col-md-6">Informações do curriculo</h2>
    
            <div class="form-group">
                <label for='experiencia' class="col-md-1 col-form-label">Experiência</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('experiencia') is-invalid @enderror" placeholder = "Detalhe sua experiência profissional" name='experiencia' id='experiencia' value="{{old('experiencia')}}"/>     
                    @error('experiencia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for='idioma' class="col-md-3 col-form-label">Idiomas</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('idioma') is-invalid @enderror" placeholder = "Digite os idiomas que você domina" name='idioma' id='idioma' value="{{old('idioma')}}"/>  
                    @error('idioma')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                </div>
            <div class="form-group">
                <label for='areaFormacao' class="col-md-3 col-form-label">Área de Formação</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('areaFormacao') is-invalid @enderror" placeholder = "Digite sua área de formação" name='area' id='area' value="{{old('area')}}"/>  
                    @error('area')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='info_adicional' class="col-md-3 col-form-label">Informações Adicionais</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('info_adicional') is-invalid @enderror" placeholder = "Detalhe suas informações adicionais" name='info_adicional' id='info_adicional' value="{{old('info_adicional')}}"/>    
                    @error('info_adicional')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-1">
                <button type='submit' class="btn btn-primary" >Finalizar</button>
            </div>
</div>
    @if($errors->any())
    @foreach ($errors->all() as $item)
        <div>{{$item}}</div>
    @endforeach
    @endif
</body>

</html>