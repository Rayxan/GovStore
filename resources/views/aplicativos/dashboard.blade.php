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
                <td><a href="/aplicativos/{{$aplicativo->id}}">{{$aplicativo->nm_nome}}</a></td>
                <td>
                    @if($aplicativo->tp_status == 'APV')
                        Aprovado
                    @else
                        Pendente
                    @endif
                </td>
                <td>
                    <a href="/aplicativos/edit/{{$aplicativo->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                    <form action="/aplicativos/{{$aplicativo->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                    </form>
                    <!-- mudar a class do botão e etc -->
                    <!-- <a href="/aplicativos/edit/{{$aplicativo->id}}" class="btn btn-success edit-btn"><ion-icon name="checkmark-circle-outline"></ion-icon></a> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem aplicativos cadastrados, <a href="/aplicativos/create">criar aplicativo.</a></p>
    @endif
</div>
@endsection