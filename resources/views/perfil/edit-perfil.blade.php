@extends('layouts.main')

@section('title', 'Editando ' . $user->name)

@section('content')

<div id="user-create-container" class="col-md-6 offset-md-3">
    <h1>Perfil</h1>
    <form action="/user/update-perfil/{{$user->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Nome</label>
            <div class="col-md-2">
                <input type="text" class="" id="name" name="name" placeholder="" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="title">Email</label>
            <div class="col-md-2">
                <input type="email" class="" id="email" name="email" placeholder="" value="{{$user->email}}">
            </div>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Enviar" id="enviar">
    
    </form>
</div>

@endsection