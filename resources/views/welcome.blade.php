@extends('layouts.main')

@section('title', 'GovStore')

@section('content')

<div class="col-md-12" id="search-container">
    <h1>Busque um aplicativo</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar...">
    </form>
</div>
<div id="aplicativos-container" class="col-md-12">
    <h2>Aplicativos de Suporte ao SICGESP</h2>
    <p>Veja todos os aplicativos</p>
    <div id="cards-container" class="row">
        <h1>Aplicativos de Suporte ao SICGESP</h1>
        @foreach($aplicativos as $aplicativo)
            @if($aplicativo->tp_tipo_app == 'SIC')
            <div class="card col-md-3">
                <h5 class="card-name">{{ $aplicativo->nm_nome}}</h5>
                <img src="/img/aplicativos/{{ $aplicativo->image }}" alt="{{ $aplicativo->nm_nome}}">
                <div class="card-body">
                    <p class="card-description">{{$aplicativo->ds_descricao}}</p>
                    <a href="{{ $aplicativo->ds_link }}" class="btn btn-primary">Acessar</a>
                    <a href="/aplicativos/{{ $aplicativo->id }}">Saber mais...</a>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <div id="cards-container1" class="row">
        <h1>Projeto Sala de Gestão e Governança da Educação Básica</h1>
        @foreach($aplicativos as $aplicativo)
            @if($aplicativo->tp_tipo_app != 'SIC')
            <div class="card col-md-3">
                <h5 class="card-name">{{ $aplicativo->nm_nome}}</h5>
                <img src="/img/aplicativos/{{ $aplicativo->image }}" alt="{{ $aplicativo->nm_nome}}">
                <div class="card-body">
                    <p class="card-description">{{$aplicativo->ds_descricao}}</p>
                    <a href="{{ $aplicativo->ds_link }}" class="btn btn-primary">Acessar</a>
                    <a href="/aplicativos/{{ $aplicativo->id }}">Saber mais...</a>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>

@endsection