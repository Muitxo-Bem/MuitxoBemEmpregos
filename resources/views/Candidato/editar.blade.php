<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Cadastrar Candidato</title>
</head>

<body>
    <div class="container">
        <form action="{{route('candidatos.update', $candidato)}}" method="POST">
            @csrf
            <h1 class="col-md-10">Atualizar informações do candidato</h1>
            <h2 class="col-md-6">Informações do candidato</h2>

            <div class="form-group">
                <label for='nome' class="col-md-1 col-form-label">Nome</label>
                <div class="col-md-6">
                <input type='text' class="form-control @error('nome') is-invalid @enderror" placeholder = "Digite seu nome" name='nome' id='nome' value="{{$candidato->nome}}"/>    
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
                    <input type='text' class="form-control @error('cpf') is-invalid @enderror" placeholder = "Digite seu CPF" name='cpf' id='cpf' value="{{$candidato->cpf}}" disabled=""/>     
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
                    <input type='text' class="form-control @error('email') is-invalid @enderror" placeholder = "Digite seu email" name='email' id='email' value="{{$candidato->email}}"/>  
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
                    <input type='text' class="form-control @error('telefone_primario') is-invalid @enderror" placeholder = "Digite seu telefone primário" name='telefone_primario' id='telefone_primario' value=""/>  {{-- {{$candidato->telefone->telefone_primario}} --}}
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
                    <input type='text' class="form-control @error('telefone_secundario') is-invalid @enderror" placeholder = "Digite seu telefone secundário (opcional)" name='telefone_secundario' id='telefone_secundario' value=""/>  {{-- {{$candidato->telefone->telefone_secundario}} --}}
                    @error('telefone_secundario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <h2 class="col-md-1">Endereço</h2>

            <div class="form-group">
                <label for='rua' class="col-md-1 col-form-label">Rua</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('rua') is-invalid @enderror" placeholder = "Digite sua rua" name='rua' id='rua' value="{{$candidato->endereco->rua}}"/>  
                    @error('rua')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='bairro' class="col-md-1 col-form-label">Bairro</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('bairro') is-invalid @enderror" placeholder = "Digite seu bairro" name='bairro' id='bairro' value="{{$candidato->endereco->bairro}}"/> 
                    @error('bairro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='numero' class="col-md-1 col-form-label">Número</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('numero') is-invalid @enderror" placeholder = "Digite seu número" name='numero' id='numero' value="{{$candidato->endereco->numero}}"/>  
                    @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='cep' class="col-md-1 col-form-label">CEP</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('cep') is-invalid @enderror" placeholder = "Digite seu CEP" name='cep' id='cep' value="{{$candidato->endereco->cep}}"/>  
                    @error('cep')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for='estado' class="col-md-1 col-form-label">Estado</label>
                <div class="col-md-6">
                    <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" value="{{$candidato->endereco->estado}}"> 
                        <option selected>Selecione seu estado</option>
                        <option>AC</option>
                        <option>AL</option> 
                        <option>AM</option>
                        <option>AP</option>   
                        <option>BA</option>   
                        <option>CE</option>   
                        <option>DF</option>   
                        <option>ES</option>   
                        <option>GO</option>   
                        <option>MA</option>   
                        <option>MG</option>   
                        <option>MS</option>   
                        <option>MT</option>   
                        <option>PA</option>   
                        <option>PB</option>   
                        <option>PE</option>   
                        <option>PI</option>
                        <option>PR</option>   
                        <option>RJ</option>   
                        <option>RN</option>   
                        <option>RO</option>   
                        <option>RR</option>   
                        <option>RS</option>   
                        <option>SC</option>   
                        <option>SE</option>   
                        <option>SP</option>
                        <option>TO</option>
                    @error('estado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror        
                    </select>
                </div>
                
            </div>
            <div class="form-group">
                <label for='cidade' class="col-md-1 col-form-label">Cidade</label>
                <div class="col-md-6">
                    <input type='text' class="form-control @error('cidade') is-invalid @enderror" placeholder = "Digite sua cidade" name='cidade' id='cidade' value="{{$candidato->endereco->cidade}}"/>  
                    @error('cidade')
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