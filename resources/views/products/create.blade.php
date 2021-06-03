@extends('layouts.adminlte')
@section('title', 'Crear Producto')
@section('content')

    <h1>Crear Producto</h1>
    <hr>

    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
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
            <label for="price">Precio</label>
            <input type="number" name="price" class="form-control {{ $errors->has('price')? 'is-invalid' : '' }}" placeholder="Ingrese Precio..." value="{{old('price')}}">
            @if($errors->has('price'))
                <div class="invalid-feedback">
                    {{$errors->first('price')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="amount">Cantidad</label>
            <input type="number" name="amount" class="form-control {{ $errors->has('amount')? 'is-invalid' : '' }}" placeholder="Ingrese Cantidad..." value="{{old('amount')}}">
            @if($errors->has('amount'))
                <div class="invalid-feedback">
                    {{$errors->first('amount')}}
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

        <div class="form-group">
            <label for="description">Categoría</label>
            <select name="id_category" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->name}} - {{$categoria->description}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Imagen</label>
            <input type="file" name="image" class="form-control {{ $errors->has('image')? 'is-invalid' : '' }}" placeholder="Ingrese Imagen..." value="{{old('image')}}">
            @if($errors->has('image'))
                <div class="invalid-feedback">
                    {{$errors->first('image')}}
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{route('products.index')}}" class="btn btn-success">Ir Atrás</a>
    </form>
@endsection