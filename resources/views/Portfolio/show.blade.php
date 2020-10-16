@extends('layouts/app')
@section('head')
@endsection
@section('content')
<h3 text='Portfólio'></h3>

<div class="jumbotron " id='jumbotron'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h3>
                    Portfólio
                </h3>
                <p>
                    <a href='{{$portfolio->link}}'>Portfólio</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection