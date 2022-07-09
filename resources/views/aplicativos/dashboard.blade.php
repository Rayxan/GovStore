@extends('layouts.main')

@section('title', 'GovStore')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    Meus Aplicativos
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    @if(count($aplicativos) > 0)
    
    @else
    <p>Você ainda não tem aplicativos cadastrados, <a href="/aplicativos/create">criar aplicativo.</a></p>
    @endif
</div>
@endsection