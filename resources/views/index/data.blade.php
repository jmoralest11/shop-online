@extends('layouts.adminlte')
@section('title', 'Datos del Envío')
@section('content')

    <i>
        <h2>Información del Pedido</h2>
    </i>

    <table  class="table table-striped table-bordered text-center" style="width:100%">
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
                <tr>
                    <td>{{$item->name}}</td>
                    <td>$ {{number_format($item->price)}}</td>
                    <td>{{$item->shop}}</td>
                    <td>$ {{number_format($item->price * $item->shop)}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="text-center">
        <span class="label label-warning">
            Total: $ {{number_format($total)}}
        </span>
    </h3>

    <hr>

    <i>
        <h2>Información del Comprador</h2>
    </i>

    <hr>

    <form action="{{url('/process-invoice')}}" method="POST">
        @csrf()

        <div class="form-group">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" value="{{Auth::user()->email}}" disabled>
        </div>
        <div class="form-group">
            <label for="address" class="form-label">Dirección Envío <strong style="color: red;">*</strong></label>
            <input type="text" name="address" class="form-control" placeholder="Ingresa Dirección Envío..." required>
        </div>
        <div class="form-group">
            <label for="phone" class="form-label">Teléfono Contacto <strong style="color: red;">*</strong></label>
            <input type="text" name="phone" class="form-control" placeholder="Ingresa Teléfono Contacto..." required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="6" placeholder="Indicaciones Para Tú Pedido..."></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="FACTURAR" class="form-control btn-success">
        </div>
    </form>

    <a href="{{url('show-cart')}}" class="form-control btn-info text-center">REGRESAR</a>

@endsection