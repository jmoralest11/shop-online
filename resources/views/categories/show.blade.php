@extends('layouts.adminlte')
@section('title', 'Detalle Categoría')
@section('content')

        <h1>Detalle de la Categoría</h1>
        <hr>
        <table class="table-bordered table text-center">
            <tr class="thead-dark">
                <th>Identificación</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha</th>
            </tr>
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->name}}</td>
                <td>{{$categoria->description}}</td>
                <td>{{$categoria->created_at}}</td>
            </tr>
        </table>
        <a href="{{route('categories.index')}}" class="btn btn-success">Volver Atrás</a>
@endsection