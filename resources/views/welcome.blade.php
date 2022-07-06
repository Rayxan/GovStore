@extends('layouts.main')

@section('title', 'GovStore')

@section('content')

<div class="col-md-12" id="search-container">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar...">
    </form>
</div>
<div id="aplicativos-container" class="col-md-12">
    <h2>Próximos Aplicativos</h2>
    <p>Veja todos os aplicativos</p>
    <div id="cards-container" class="row">
        @foreach($aplicativos as $aplicativo)
        <div class="card col-md-3">
            <h5 class="card-name">{{ $aplicativo->nm_nome_aplicativo}}</h5>
            <img src="/img/dragons.jpeg" alt="{{ $aplicativo->nm_nome_aplicativo}}">
            <div class="card-body">
                <p class="card-description">{{$aplicativo->ds_descricao_aplicativo}}</p>
                <a href="#" class="btn btn-primary">Acessar</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection