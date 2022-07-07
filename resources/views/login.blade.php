@extends('layouts.main')

@section('title', 'Produto')

@section('content')

<div id="aplicativo-create-container" class="col-md-6 offset-md-3">
    <h1>Login</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('auth.user') }}">
        @csrf
        <div class="form-group">
            <label for="title">Email</label>
            <div class="col-md-4">
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email.">
            </div>
        </div>
        <div class="form-group">
            <label for="title">Password</label>
            <div class="col-md-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha.">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

    </form>
</div>

@endsection