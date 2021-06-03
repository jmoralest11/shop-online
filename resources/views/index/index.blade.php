@extends('layouts.adminlte')
@section('title', 'Nuestros Productos')
@section('content')

    <h1>Catálogo de Productos</h1>

    <hr>

    @foreach($productos as $producto)
        @if($producto->amount > 0)
            <div class="listado_productos">
                <a href="{{url('detail-product') . '/' . $producto->id}}"><img src="{{asset('storage').'/'.$producto->image}}" alt="" width="300" height="200"></a>
                <div class="informacion">
                    <p><strong>Nombre del Producto: </strong>{{$producto->name}}</p>
                    <p><strong>Precio del Producto: </strong>$ {{number_format($producto->price)}}</p>
                    <p><i class="fa fa-truck fa-2x" aria-hidden="true"></i>Servicio Domicilio</p>
                </div>
                <a href="{{url('detail-product') . '/' . $producto->id}}"><button class="btn btn-primary my-2"><i class="fa fa-info" aria-hidden="true"></i>LEER MÁS</button></a>
                <a href="{{url('add-cart') . '/' . $producto->id}}"><button class="btn btn-warning my-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i>AGREGAR CARRITO</button></a>
            </div>
        @endif
    @endforeach

    @section('scripts')
        @if(Session::has('Mensaje'))
            <script>toastr.success("{{Session::get('Mensaje')}}")</script>
        @endif
    @endsection

@endsection