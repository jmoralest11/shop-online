<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (Auth::user()->role == 'admin')
                <div class="image">
                    <img src="{{asset('imagenes/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
            @else
                <div class="image">
                    <img src="{{asset('imagenes/user_logo.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
            @endif
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if (Auth::user()->role  == 'user')
                    <li class="nav-item">
                        <a href="{{url('show-cart')}}" class="nav-link {{Request::is('show-cart') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
                            <p>Mi Carrito</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/show-products')}}" class="nav-link {{Request::is('show-products') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-shopping-basket" aria-hidden="true"></i>
                            <p>Ir a Comprar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/show-invoices')}}" class="nav-link {{Request::is('show-invoices') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-calendar-minus-o" aria-hidden="true"></i>
                            <p>Mis Facturas</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role  == 'admin')
                <li class="nav-item">
                    <a href="{{url('/categories')}}" class="nav-link {{Request::is('categories') ? 'active' : ''}}">
                        <i class="fa fa-cubes nav-icon" aria-hidden="true"></i>
                        <p>Categorías</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/products')}}" class="nav-link {{Request::is('products') ? 'active' : ''}}">
                        <i class="fa fa-product-hunt nav-icon" aria-hidden="true"></i>
                        <p>Productos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/show-invoices')}}" class="nav-link {{Request::is('show-invoices') ? 'active' : ''}}">
                        <i class="fa fa-shopping-bag nav-icon"></i>
                        <p>Ventas</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>