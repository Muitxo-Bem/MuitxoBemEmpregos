@extends('layouts/app')
@section('head')
<link href="{{asset('css/show_curriculo.css')}}" rel='stylesheet'>
@endsection
@section('content')
<h3 text='Curriculo'></h3>

<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-6'>
            <h3 id='nome'>{{$curriculo->dono->nome}}</h3>
        </div>
        @can('editCurriculoCheck', $curriculo)
        <div class='col-md-6' id='editar'>
            <form action="{{route('curriculos.edit',['curriculo' => $curriculo->id])}}" method="GET"> 
                <button type="submit" class="btn btn-secondary">Editar Curriculo</button>
            </form>
        </div>
        @endCan
    </div>
</div>
<div class="jumbotron " id='jumbotron'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h3>
                    Informações adicionais
                </h3>
                <p>
                    {{$curriculo->info_adicional}}
                </p>
            </div>
            <div class="col-md-4">
                <h3>
                    Experiência
                </h3>
                <p>
                    {{$curriculo->experiencia}}
                </p>
            </div>
            <div class="col-md-4">
                <h3>
                    Idiomas
                </h3>
                <p>
                    @foreach($curriculo->idiomas()->get() as $idioma)
                        <tr class='curriculo'>
                        <td class='idioma'><a>{{$idioma->idioma}}</a></td>
                        </tr>
                    @endforeach
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>
                    Área de Formação
                </h3>
                <p>
                @foreach($curriculo->areaFormacaos()->get() as $areaFormacao)
                        <tr class='curriculo'>
                        <td class='areaFormacaos'><a>{{$areaFormacao->area}}</a></td>
                        </tr>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@endsection