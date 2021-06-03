@extends('layouts.adminlte')
@section('title', 'Detalle Producto')
@section('content')

        <h1>Detalle del Producto</h1>
        <hr>
        <table class="table-bordered table text-center">
            <tr class="thead-dark">
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Fecha</th>
                <th>Imagen</th>
            </tr>
            <tr>
                <td>{{$producto->name}}</td>
                <td>$ {{number_format($producto->price)}}</td>
                <td>{{$producto->amount}}</td>
                <td>{!!$producto->description!!}</td>
                <td>{{$producto->categorias->name}} - {{$producto->categorias->description}}</td>
                <td>{{$producto->created_at}}</td>
                <td><img src="{{asset('storage/'.$producto->image)}}" width="100" class="img-fluid"></td>
            </tr>
        </table>
        <a href="{{route('products.index')}}" class="btn btn-success">Volver Atrás</a>
@endsection