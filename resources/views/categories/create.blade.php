@extends('layouts.adminlte')
@section('title', 'Crear Categoría')
@section('content')

<h1>Crear Categoría</h1>
    <hr>

    <form action="{{route('categories.store')}}" method="POST">
        @csrf()

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control {{ $errors->has('name')? 'is-invalid' : '' }}" placeholder="Ingrese Nombre..." value="{{old('name')}}">
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="trumbowyg-demo" type="text" name="description" class="form-control {{ $errors->has('descripcion')? 'is-invalid' : '' }}" placeholder="Ingrese Descripción..." value="{{old('description')}}"></textarea>
            @if($errors->has('description'))
                <div class="invalid-feedback">
                    {{$errors->first('description')}}
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{route('categories.index')}}" class="btn btn-success">Ir Atrás</a>
    </form>

@endsection