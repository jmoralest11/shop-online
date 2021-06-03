@extends('layouts.adminlte')
@section('title', 'Detalle Producto')
@section('content')

    <div class="container">
        <img src="{{asset('storage').'/'.$producto->image}}" width="570" height="500">
    </div>

    <div class="detalle">
        <h1>{{$producto->name}}</h1>
        <p class="precio"><strong><span>Hoy </span>$ </strong>{{number_format($producto->price)}}</p>
        <p style=" color: green; font-size: 1.5rem;">Disponibles: <span style="font-weight: bold; ">{{$producto->amount}}</span></p>
        <h2>Descripción</h2>
        <p class="descripcion">{!!$producto->description!!}</p>
        <a href="{{url('add-cart').'/'.$producto->id}}"><button type="submit" class="btn btn-warning my-2 comprar"><i class="fa fa-shopping-cart" aria-hidden="true"></i>AGREGAR CARRITO</button></a>
        <a href="{{url('/show-products')}}"><button class="btn btn-danger my-2 comprar">VOLVER</button></a>
    </div>

@endsection