<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Trumbowyg -->
    <link rel="stylesheet" href="{{asset('dist/ui/trumbowyg.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item text-nowrap">
                <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.menu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        @yield('content')
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                        <!-- /.card -->

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer text-center">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Viviana Mosquera</a>.</strong> Todos los derechos reservados.
    </footer>
</div>

<!-- jQuery -->
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>

<!-- Bootstrap Js-->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- AdminLTE -->
<script src="{{asset('js/adminlte.js')}}"></script>

<!-- Datatables js -->
<script src="{{asset('js/datatables.min.js')}}"></script>

<!-- Actualizar Cantidad Carrito -->
<script src="{{asset('js/carrito.js')}}"></script>

<!-- Trumbowyg -->
<script src="{{asset('dist/trumbowyg.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('js/toastr.min.js')}}"></script>

@yield('scripts')

<!-- DATATABLES -->
<script>
    $(document).ready(function() {
        $('#trumbowyg-demo').trumbowyg();
        
        $('#example').DataTable(
            {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontro la página, lo siento!",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No valores disponibles",
                    "search": "Buscar",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Ultima",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                     },
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total registros)"
                }
            }
        );
    });
</script>

</body>
</html>
