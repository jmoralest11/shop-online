@extends('layouts.adminlte')
@section('title', 'Mi Carrito')
@section('content')

    <h1 class="text-center"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mi Carrito de Compras</h1>

    <hr>

    @if(count($carrito))

    <div class="text-center">
        <a href="{{url('/clean-cart')}}">
            <button class="btn btn-danger">VACIAR CARRITO <i class="fa fa-trash" aria-hidden="true"></i></button>
        </a>
    </div>

    <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carrito as $item)
                <tr>
                    <td>
                        <img src="{{asset('/storage').'/'.$item->image}}" width="100">
                    </td>
                    <td>{{$item->name}}</td>
                    <td>$ {{number_format($item->price)}}</td>
                    <td>
                        <input type="number" min="1" max="100" id="producto_{{$item->id}}" value="{{$item->shop}}">
                        <a href="#" class="btn btn-primary btn-update-item" data-href="{{url('/update-cart').'/'.$item->id}}" data-id="{{$item->id}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </td>
                    <td>$ {{number_format($item->price * $item->shop)}}</td>
                    <td>
                        <a href="{{url('remove-cart').'/'.$item->id}}">
                            <button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h3 class="text-center">
        <span class="label label-success">
            Total: $ {{number_format($total)}}
        </span>
    </h3>

    @else
        <h3 class="text-center"><span class="label label-warning">No hay productos en el carrito</span></h3>
    @endif

    <hr>

    <p class="text-center">
        <a href="{{url('/show-products')}}" class="btn btn-primary">
            <i class="fa fa-chevron-circle-left"></i> SEGUIR COMPRANDO
        </a>

        <a href="{{url('data-shop')}}" class="btn btn-primary">
            CONTINUAR <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
        </a>
    </p>

    @section('scripts')
        @if(Session::has('Mensaje'))
             <script>toastr.success("{{Session::get('Mensaje')}}")</script>
        @endif
    @endsection
@endsection