@extends('layouts.main')

@section('title', 'GovStore')

@section('content')

<a href="/products">Produtos</a>
@if(10 > 5)
<h2>troll</h2>
@endif
<h1>algum título</h1>

<img src="/img/hisok4.jpg" alt="">


@if($nome == "Raylis")
<p>Meu nome é {{ $nome }} e eu gosto de {{ $cic }}</p>
@else
<p>Meu nome não é {{ $nome }}</p>
@endif

@for($i = 0; $i < count($arr); $i++) 
    <p>{{ $arr[$i] }}</p>
@endfor

@php
$numero = 56;

echo $numero;
@endphp

@foreach($nomes as $nome)
<p>{{ $nome }}</p>
@endforeach

@endsection