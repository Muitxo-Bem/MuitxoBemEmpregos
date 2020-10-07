@extends('layouts/app')
@section('head')
    <link href="{{ asset('css/list_vagas.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="form-group has-search" id="search-bar">
    <span class="fa fa-search form-control-feedback" id='search-icon'></span>
    <input type="text" class="form-control" placeholder="Pesquise aqui sua vaga" id='searchbar' onkeyup="searchVaga()">
</div>

<div class="jumbotron " id='jumbotron'>
    <h2 class="display-5">Vagas</h2>
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
        @foreach ($vagas as $vaga)
            @if ($vaga->ativa != 0)
                <tr class='vaga'>
                    <td><img id = 'img-vaga' src="https://www.sportsjournalists.co.uk/wp-content/uploads/2016/04/Google-logo-for-featured-pic.jpg" alt="img"></td>
                    <td class='nomeVaga'>{{$vaga->nome}}</td>
                    <td class='nomeEmpregador'>{{$vaga->empregador->nome}}</td>
                    <td class='localVaga'>{{$vaga->local_de_trabalho}}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
      </table>
      
     
    </div>
</div>
<script>
    function searchVaga(){
        let input = document.getElementById('searchbar').value;
        input = input.toLowerCase();
        let vagas = document.getElementsByClassName('vaga');
        for(i=0; i<vagas.length; i++){
            if(!vagas[i].children[1].innerHTML.toLowerCase().includes(input)){
                vagas[i].style.display='none';
            }
            else{
                vagas[i].style.display='';
            }
        }
    }
</script>

@endsection
