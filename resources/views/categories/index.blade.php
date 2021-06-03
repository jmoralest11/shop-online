@extends('layouts.adminlte');
@section('title', 'Categorías')
@section('content')

<h1>Listado de Categorías</h1>

<hr>

<a href="{{route('categories.create')}}" class="btn btn-info">Crear</a>

<hr>

<table id="example" class="table table-striped table-bordered text-center" style="width:100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{$categoria->name}}</td>
            <td>{!!$categoria->description!!}</td>
            <td>
                <a href="{{route('categories.show', $categoria->id)}}" class="btn btn-primary"><i class="fa fa-info" aria-hidden="true"></i></a>
                <a href="{{route('categories.edit', $categoria->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <form action="{{route('categories.destroy', $categoria->id)}}" method="POST">
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