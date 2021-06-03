@extends('layouts.adminlte')
@section('title', 'Editar Producto')
@section('content')

        <h1>Editar Producto</h1>

        <hr>

        <form action="{{route('products.update', $producto->id)}}" method="POST">
            @csrf()
            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" value="{{$producto->name}}" class="form-control" placeholder="Ingrese Nombre...">
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" value="{{$producto->price}}" class="form-control" placeholder="Ingrese Precio...">
            </div>

            <div class="form-group">
                <label for="amount">Cantidad</label>
                <input type="number" name="amount" value="{{$producto->amount}}" class="form-control" placeholder="Ingrese Cantidad...">
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="trumbowyg-demo" type="text" name="description" class="form-control" placeholder="Ingrese Descripción...">{!!$producto->description!!}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{route('products.index')}}" class="btn btn-success">Volver Atrás</a>
        </form>

@endsection
