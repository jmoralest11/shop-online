@extends('layouts.adminlte')
@section('title', 'Mis Facturas')
@section('content')

<h1 class="text-center">Facturas</h1>

<hr>

<table id="example" class="table table-striped table-bordered text-center" style="width:100%">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shops as $shop)
            @if($shop->condition == 'SIN ENVIAR')
                <tr style="background-color: #EBA293;">
                    <td>{{$shop->id}}</td>
                    <td>{{$shop->usuarios->name}}</td>
                    <td>{{$shop->address}}</td>
                    <td>{{$shop->phone}}</td>
                    <td>$ {{number_format($shop->total)}}</td>
                    <td>{{$shop->condition}}</td>
                    <td>{{$shop->created_at}}</td>
                    <td>
                        @if(Auth::user()->role == 'admin')
                            <a href="{{url('edit-condition') . '/' . $shop->id}}" class="btn btn-warning">Estado</a>
                        @endif
                        <a href="{{url('show-invoice') . '/' . $shop->id}}" class="btn btn-success">Ver Factura</a>
                    </td>
                </tr>
            @endif
            @if($shop->condition == 'ENVIADO')
                <tr style="background-color: #8FE893;">
                    <td>{{$shop->id}}</td>
                    <td>{{$shop->usuarios->name}}</td>
                    <td>{{$shop->address}}</td>
                    <td>{{$shop->phone}}</td>
                    <td>$ {{number_format($shop->total)}}</td>
                    <td>{{$shop->condition}}</td>
                    <td>{{$shop->created_at}}</td>
                    <td>
                        @if(Auth::user()->role == 'admin')
                            <a href="{{url('edit-condition') . '/' . $shop->id}}" class="btn btn-warning">Estado</a>
                        @endif
                        <a href="{{url('show-invoice') . '/' . $shop->id}}" class="btn btn-success">Ver Factura</a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

@section('scripts')
    @if(Session::has('Mensaje'))
        <script>
            toastr.success('{{Session::get('Mensaje')}}');
        </script>
    @endif
@endsection

@endsection