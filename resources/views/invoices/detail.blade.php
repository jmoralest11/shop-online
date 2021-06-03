@extends('layouts.adminlte')
@section('title', 'Detalle Factura')
@section('content')

<div class="container border border-dark" style="width: 60%; background-color: #E9EEF2">
    <span style="float: right"><b>Celular: +57 (3) 23 301 15 56</b></span>
    <h2><strong>Tortas Julian S.A.S</strong></h2>
    <hr>

    <h1 class="text-center"><strong>INFORMACIÓN DEL USUARIO</strong></h1>

    <table class="table table-striped text-center">
        <tr>
            <td>Referencia</td>
            <td>{{$invoice->id}}</td>
        </tr>
        <tr>
            <td>Nombre Títular</td>
            <td>{{$invoice->usuarios->name}}</td>
        </tr>
        <tr>
            <td>Correo Títular</td>
            <td>{{$invoice->usuarios->email}}</td>
        </tr>
        <tr>
            <td>Dirección Envío</td>
            <td>{{$invoice->address}}</td>
        </tr>
        <tr>
            <td>Teléfono Contacto</td>
            <td>{{$invoice->phone}}</td>
        </tr>
    </table>

    <h2 class="text-center my-4"><strong>INFORMACIÓN DE LOS PRODUCTOS</strong></h2>

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
            @foreach($products as $product)
            <tr class="text-center">
                <td>{{$product->products->name}}</td>
                <td>$ {{number_format($product->price)}}</td>
                <td>{{$product->amount}}</td>
                <td>$ {{number_format($product->price * $product->amount)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-center" style="font-size: 1.5rem">
        <strong>TOTAL: $ {{number_format($invoice->total)}}</strong>
    </p>

</div>

<p class="text-center">
    <a href="{{url('/show-invoices')}}" class="btn btn-primary my-4">Regresar</a>
    <a href="{{url('generator-pdf') . '/' . $invoice->id}}" class="btn btn-warning">Descargar Factura</a>
</p>

@endsection