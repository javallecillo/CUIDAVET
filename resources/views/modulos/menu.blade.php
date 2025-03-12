<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar fixed-menu">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!-- Menu item: Inicio -->
            <li>
                <a href="{{ url('Inicio') }}">
                    <i class="fa fa-home"></i> <span>Inicio</span>
                </a>
            </li>
            <!-- Menu item: Clientes -->
            <li>
                <a href="{{ url('Clientes') }}">
                    <i class="fa fa-users"></i> <span>Clientes</span>
                </a>
            </li>
            <!-- Menu item: Empleados -->
            <li>
                <a href="{{ url('Empleados') }}">
                    <i class="fa fa-id-badge"></i> <span>Empleados</span>
                </a>
            </li>
            <!-- Menu item: Mascotas -->
            <li>
                <a href="{{ url('Mascotas') }}">
                    <i class="fa fa-paw"></i> <span>Mascotas</span>
                </a>
            </li>
            <!-- Menu item: Clinica with sub-menu -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-hospital-o"></i> 
                    <span>Clinica</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Sub-menu item: Veterinarios -->
                    <li><a href="{{ url('Veterinarios') }}">
                        <i class="fa fa-user-md"></i> Veterinarios</a></li>
                    <!-- Sub-menu item: Citas -->
                    <li><a href="{{ url('Citas') }}">
                        <i class="fa fa-calendar"></i> Citas</a></li>
                    <!-- Sub-menu item: Internaciones -->
                    <li><a href="{{ url('Internaciones') }}">
                        <i class="fa fa-bed"></i> Internaciones</a></li>
                </ul>
            </li>
            <!-- Horizontal line separator -->
            <hr>
            <!-- Menu item: Cajas -->
            <li><a href="{{ url('Cajas') }}">
                <i class="fa fa-fax"></i> <span>Cajas</span></a></li>
            <!-- Menu item: Productos with sub-menu -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cube"></i> 
                    <span>Productos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Sub-menu item: Categorias -->
                    <li><a href="{{ url('Categorias') }}">
                        <i class="fa fa-tags"></i> Categorias</a></li>
                    <!-- Sub-menu item: Gestor de Productos -->
                    <li><a href="{{ url('GestorProductos') }}">
                        <i class="fa fa-cubes"></i> Gestor de Productos</a></li>
                    <!-- Sub-menu item: Inventario -->
                    <li><a href="{{ url('Inventario') }}">
                        <i class="fa fa-archive"></i> Inventario</a></li>
                </ul>
            </li>
            <!-- Menu item: Pproveedores -->
            <li>
                <a href="{{ url('Proveedores') }}">
                    <i class="fa fa-user"></i> <span>Proveedores</span>
                </a>
            </li>
            <!-- Menu item: Compras -->
            <li><a href="{{ url('Compras') }}">
                <i class="fa fa-shopping-cart"></i> <span>Compras</span></a></li>
            <!-- Menu item: Ventas -->
            <li><a href="{{ url('Ventas') }}">
                <i class="fa fa-money"></i> <span>Ventas</span></a></li>
            <!-- Menu item: Informes -->
            <li><a href="{{ url('Informes') }}">
                <i class="fa fa-bar-chart"></i> <span>Informes</span></a></li>
            <!-- Horizontal line separator -->
            @if(auth()->user()->id_rol == 1)
                <hr>
            <!-- Menu item: Ajustes -->
                <li><a href="{{ route('ajustes.index') }}">
                    <i class="fa fa-cogs"></i> <span>Ajustes</span></a>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>