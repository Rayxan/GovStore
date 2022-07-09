@extends('layouts.main')

@section('title', $aplicativo->nm_nome)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-4">
            <img style="width: 350px; " src="/img/aplicativos/{{ $aplicativo->image }}" class="image-fluid" alt="{{ $aplicativo->nm_nome }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$aplicativo->nm_nome}}</h1>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o Aplicativo:</h3>
            <p class="event-description"> {{$aplicativo->ds_descricao}}</p>            
        </div>
    </div>
</div>

@endsection