@extends('layouts.adminlte')
@section('title', 'Información del Pedido')
@section('content')

<div class="container border border-dark" style="width: 60%; background-color: #C8E5F5">
    <span style="float: right"><b>Celular: +57 (3) 23 758 15 16</b></span>
    <h2><strong>Tortas Julian S.A.S</strong></h2>
    <hr>
    <h2 class="text-center my-4"><strong>DATOS DEL USUARIO</strong></h2>
    <hr>

    <table class="table table-striped text-center">
        <tr>
            <td>Nombre Títular</td>
            <td>{{Auth::user()->name}}</td>
        </tr>
        <tr>
            <td>Correo Ti</td>
            <td>{{Auth::user()->email}}</td>
        </tr>
    </table>

    <h2 class="text-center my-4"><strong>DATOS DEL PEDIDO</strong></h2>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carrito as $item)
            <tr class="text-center">
                <td>{{$item->name}}</td>
                <td>$ {{number_format($item->price)}}</td>
                <td>{{$item->shop}}</td>
                <td>$ {{number_format($item->price * $item->shop)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3 class="text-center my-4">
        <span class="label label-info">
            Total: ${{number_format($total)}}
        </span>
    </h3>
    <p class="text-center">
        <a href="{{url('/show-cart')}}" class="btn btn-primary">
            <i class="fa fa-chevron-circle-left"></i> REGRESAR
        </a>

        <a href="{{url('/factura')}}" class="btn btn-warning">
            PAGAR <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
        </a>
    </p>
</div>

@endsection