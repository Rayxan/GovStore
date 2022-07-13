@extends('layouts.main')

@section('title', 'GovStore')

@section('content')

<div id="aplicativo-create-container" class="col-md-6 offset-md-3">
    <h1>Novo Aplicativo</h1>
    <form action="/aplicativos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do Evento</label>
            <div class="col-md-2">
                <input style="width: 300px;" type="file" id="image" name="image" class="form-control-file">
            </div>
        </div>
        <div class="form-group">
            <label for="title">Nome da Aplicação</label>
            <div class="col-md-2">
                <input style="width:577px;" type="text" class="" id="nm_nome" name="nm_nome" placeholder="Digite o nome da Aplicação.">
            </div>
        </div>
        <div class="form-group">
            <label for="title">Link</label>
            <div class="col-md-2">
                <input style="width:577px;" type="text" class="" id="ds_link" name="ds_link" placeholder="Digite o link da Aplicação.">
            </div>
        </div>
        <div class="form-group">
            <label for="title">Descrição</label>
            <textarea name="ds_descricao" id="ds_descricao" class="form-control" placeholder="Descreva a sua aplicação."></textarea>
        </div>
        <div class="form-group">
            <label for="title">Tipo de Aplicação</label>
            <select name="tp_tipo_app" id="tp_tipo_app" class="form-control">
                <option value="SIC">SICGESP</option>
                <option value="GEG">Gestão e Governança</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Inserir Aplicativo">
    </form>
</div>

@endsection