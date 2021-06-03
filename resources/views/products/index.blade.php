@extends('layouts.adminlte')
@section('title', 'Productos')
@section('content')

<h1>Listado de Productos</h1>

<hr>

<a href="{{route('products.create')}}" class="btn btn-info">Crear</a>

<hr>

<table id="example" class="table table-striped table-bordered text-center" style="width:100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Categoría</th>
            <th>Imagen</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{$producto->name}}</td>
            <td>$ {{number_format($producto->price)}}</td>
            <td>{{$producto->amount}}</td>
            <td>{{$producto->categorias->name}} - {{$producto->categorias->description}}</td>
            <td><img src="{{asset('storage/'.$producto->image)}}" width="100" class="img-thumbnail img-fluid"></td>
            <td>
                <a href="{{route('products.show',$producto->id)}}" class="btn btn-primary"><i class="fa fa-info" aria-hidden="true"></i></a>
                <a href="{{route('products.edit',$producto->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <form action="{{route('products.destroy', $producto->id)}}" method="POST">
                    @csrf()
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@section('scripts')
    @if(Session::has('Mensaje'))
        <script>
            toastr.success("{{Session::get('Mensaje')}}")
        </script>
    @endif
@endsection

@endsection