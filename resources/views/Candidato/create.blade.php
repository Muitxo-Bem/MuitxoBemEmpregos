<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Cadastrar candidato</title>
</head>

<body>
    <div class="container">
        <form action="{{route('candidatos.store')}}" method="POST">
            @csrf
            <h1>Cadastro</h1>
            <h2>Informações do candidato</h2>

            <div class="form-group">
                <label for='nome' class="col-md-1 col-form-label">Nome</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite seu nome" name='nome' id='nome' value="{{old('nome')}}" required autofocus />    
                </div>
            </div>
            <div class="form-group">
                <label for='cpf' class="col-md-1 col-form-label">CPF</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite seu CPF" name='cpf' id='cpf' value="{{old('cpf')}}" required autofocus />     
                </div>
            </div>
            <div class="form-group">
                <label for='email' class="col-md-1 col-form-label">Email</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite seu email" name='email' id='email' value="{{old('email')}}" required autofocus />  
                </div>
            </div>
            <div class="form-group">
                <label for='Senha' class="col-md-1 col-form-label">Senha</label>
                <div class="col-md-6">
                    <input type='password' class="form-control" placeholder = "Digite sua senha" name='senha' id='senha' required autofocus />  
                </div>
            </div>

            <div class="form-group">
                <label for='ConfirmaçãoSenha' class="col-md-3 col-form-label">Confirme sua senha</label>
                <div class="col-md-6">
                    <input type='password' class="form-control" placeholder = "Digite sua senha novamente" name='senha_confirmation' id='senha_confirmation' required autofocus />  
                </div>
            </div>

            <h2>Telefone</h2>

            <div class="form-group">
                <label for='telefone_primario' class="col-md-3 col-form-label">Telefone primário</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite seu telefone primário" name='telefone_primario' id='telefone_primario' value="{{old('telefone_primario')}}" required autofocus />  
                </div>
            </div>
            <div class="form-group">
                <label for='telefone_secundario' class="col-md-3 col-form-label">Telefone secundário</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite seu telefone secundário (opcional)" name='telefone_secundario' id='telefone_secundario' value="{{old('telefone_secundario')}}" required autofocus />  
                </div>
            </div>

            <h2>Endereço</h2>

            <div class="form-group">
                <label for='rua' class="col-md-1 col-form-label">Rua</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite sua rua" name='rua' id='rua' value="{{old('rua')}}" required autofocus />  
                </div>
            </div>
            <div class="form-group">
                <label for='bairro' class="col-md-1 col-form-label">Bairro</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite seu bairro" name='bairro' id='bairro' value="{{old('bairro')}}" required autofocus /> 
                </div>
            </div>
            <div class="form-group">
                <label for='numero' class="col-md-1 col-form-label">Número</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite seu número" name='numero' id='numero' value="{{old('numero')}}" required autofocus />  
                </div>
            </div>
            <div class="form-group">
                <label for='cep' class="col-md-1 col-form-label">CEP</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite seu CEP" name='cep' id='cep' value="{{old('cep')}}" required autofocus />  
                </div>
            </div>
            <div class="form-group">
                <label for='estado' class="col-md-1 col-form-label">Estado</label>
                <div class="col-md-6">
                    <select name="estado" id="estado" class="form-control" value="{{old('estado')}}" required autofocus> 
                        <option selected>Selecione seu estado</option>
                        <option>teste</option>
                        <option>testeUniu</option>    
                    </select>
                </div>
                
            </div>
            <div class="form-group">
                <label for='cidade' class="col-md-1 col-form-label">Cidade</label>
                <div class="col-md-6">
                    <input type='text' class="form-control" placeholder = "Digite sua cidade" name='cidade' id='cidade' value="{{old('cidade')}}" required autofocus />  
                </div>
            </div>

            <button type='submit' class="btn btn-primary" >Cadastrar</button>
        </form>
    </div>
    
    @if($errors->any())
    @foreach ($errors->all() as $item)
        <div>{{$item}}</div>
    @endforeach
    @endif

</body>

</html>