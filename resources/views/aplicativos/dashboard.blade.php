@extends('layouts.main')

@section('title', 'GovStore')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    Meus Aplicativos
</div>
<div class="col-md-10 offset-md-1 dashboard-aplicativos-container">
    @if(count($aplicativos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aplicativos as $aplicativo)
            <tr>
                <td scope="row">{{$loop->index+1}}</td>
                <td><a href="/aplicativos/{{$aplicativo->id}}">{{$aplicativo->nm_nome}}</a></td>
                <td><a href="#">Editar</a> <a href="#">Deletar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem aplicativos cadastrados, <a href="/aplicativos/create">criar aplicativo.</a></p>
    @endif
</div>
@endsection