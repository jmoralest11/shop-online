@extends('layouts.adminlte')
@section('title', 'Editar Categoría')
@section('content')

        <h1>Editar Categoría</h1>

        <hr>

        <form action="{{route('categories.update', $categoria->id)}}" method="POST">
            @csrf()
            
            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" value="{{$categoria->name}}" class="form-control" placeholder="Ingrese Nombre...">
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="trumbowyg-demo" type="text" name="description" class="form-control" placeholder="Ingrese Descripción...">{!!$categoria->description!!}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{route('categories.index')}}" class="btn btn-success">Volver Atrás</a>
        </form>

@endsection
