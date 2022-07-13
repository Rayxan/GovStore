@extends('layouts.main')

@section('title', 'Editando' . $aplicativo->nm_nome)

@section('content')

<div id="aplicativo-create-container" class="col-md-6 offset-md-3">
    <h1>Editando {{$aplicativo->nm_nome}}</h1>
    <form action="/aplicativos/update/{{$aplicativo->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do Evento</label>
            <div class="col-md-2">
                <input style="width: 300px;" type="file" id="image" name="image" class="form-control-file">
                <img src="/img/aplicativos/{{$aplicativo->image}}" class="img-preview" alt="{{$aplicativo->nm_nome}}">
            </div>
        </div>
        <div class="form-group">
            <label for="title">Nome da Aplicação</label>
            <div class="col-md-2">
                <input type="text" class="" id="nm_nome" name="nm_nome" placeholder="Digite o nome da Aplicação." value="{{$aplicativo->nm_nome}}">
            </div>
        </div>
        <div class="form-group">
            <label for="title">Link</label>
            <div class="col-md-2">
                <input type="text" class="" id="ds_link" name="ds_link" placeholder="Digite o link da Aplicação." value="{{$aplicativo->ds_link}}">
            </div>
        </div>
        <div class="form-group">
            <label for="title">Descrição</label>
            <textarea name="ds_descricao" id="ds_descricao" class="form-control" placeholder="Descreva a sua aplicação.">{{$aplicativo->ds_descricao}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Tipo de Aplicação</label>
            <select name="tp_tipo_app" id="tp_tipo_app" class="form-control">
                <option value="SIC" {{$aplicativo->tp_tipo_app == 'SIC' ? "selected='selected'" : "" }}>SICGESP</option>
                <option value="GEG" {{$aplicativo->tp_tipo_app != 'SIC' ? "selected='selected'" : "" }}>Gestão e Governança</option>
            </select>
        </div>
        @if($aplicativo->tp_status == "PEN")
            <input type="submit" class="btn btn-success" value="Aprovar Edição">
        @else
            <input type="submit" class="btn btn-primary" value="Editar Aplicativo">
        @endif
    </form>
</div>

@endsection