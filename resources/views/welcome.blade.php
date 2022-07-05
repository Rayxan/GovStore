@extends('layouts.main')

@section('title', 'GovStore')

@section('content')

@foreach($aplicativos as $aplicativo)
    <p>{{ $aplicativo->nm_nome_aplicativo }} --
     {{ $aplicativo->ds_descricao_aplicativo }}    
    </p>
@endforeach

@endsection