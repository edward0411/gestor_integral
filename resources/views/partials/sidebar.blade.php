<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('panel/administrativo/clearcache')}}" class="brand-link">
        <center>
            <img src="{{ asset('dist/img/logo.jpg') }}" alt="" style="opacity: .8">
        </center>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->u_nickname }}</a>
            </div>
        </div>

        <nav class="mt-2">
            @if((\Auth::user()->u_state != 5) )
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('Administrador')
                @if((\Auth::user()->roles()->first()->id == 1) || (\Auth::user()->roles()->first()->id == 2))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icofont-lock"></i>
                        <p>
                            <font size="4">Administrador</font>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('Administrador_clientes_ver')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icofont-users-social"></i>
                                <p>
                                    <font size="3">Clientes</font>
                                </p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('customers.index')}}" class="nav-link">
                                        <i class="icofont-checked"></i>
                                        <p>Clientes Activos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('customers.inactives')}}" class="nav-link">
                                        <i class="icofont-close-squared-alt"></i>
                                        <p>Clientes Inactivos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('Administrador_tutores_ver')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icofont-users-alt-5"></i>
                                <p>Tutores</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('tutors.index')}}" class="nav-link">
                                        <i class="icofont-check-circled"></i>
                                        <p>Tutores Activos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('tutors.inactives')}}" class="nav-link">
                                        <i class="icofont-close-circled"></i>
                                        <p>Tutores Inactivos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('Administrador_empleados_ver')
                        <li class="nav-item">
                            <a href="{{route('employees.index')}}" class="nav-link">
                                <i class="icofont-people"></i>
                                <p>Empleados</p>
                            </a>
                        </li>
                        @endcan
                        @can('Administrador_roles_ver')
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link">
                                <i class="icofont-users-alt-3"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan
                        @can('Administrador_paises_ver')
                        <li class="nav-item">
                            <a href="{{route('countries.index')}}" class="nav-link">
                                <i class="icofont-earth"></i>
                                <p>Países</p>
                            </a>
                        </li>
                        @endcan
                        @can('Administrador_parametricas_ver')
                        <li class="nav-item">
                            <a href="{{route('parametrics.index')}}" class="nav-link">
                                <i class="icofont-chart-flow"></i>
                                <p>Paramétricas</p>
                            </a>
                        </li>
                        @endcan
                        @can('Administrador_monedas_ver')
                        <li class="nav-item">
                            <a href="{{route('coins.index')}}" class="nav-link">
                                <i class="icofont-coins"></i>
                                <p>Monedas</p>
                            </a>
                        </li>
                        @endcan
                        @can('Administrador_areas_ver')
                        <li class="nav-item">
                            <a href="{{route('areas.index')}}" class="nav-link">
                                <i class="icofont-education"></i>
                                <p>Áreas</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
                <!-- /.Modulo Administrador -->
                @endcan
                @if(\Auth::user()->roles()->first()->id != 4)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icofont-education"></i>
                        <p>
                            <font size="4">Pre Registros</font>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @if(\Auth::user()->roles()->first()->id == 6)
                        <li class="nav-item">
                            <a href="{{route('pre_registration.index_registration')}}" class="nav-link">
                                <i class="icofont-paper"></i>
                                <p>
                                    <font size="3">Mi Registro</font>
                                </p>
                            </a>
                        </li>
                        @else
                        @can('Preregistro_listado_ver')
                        <li class="nav-item">
                            <a href="{{route('pre_registration.index_turors_list')}}" class="nav-link">
                                <i class="icofont-tasks"></i>
                                <p>
                                    <font size="3">Listado</font>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @endif
                    </ul>
                </li>
                @endif

                <!-- /.Modulo Pre Registro -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icofont-money"></i>
                        <p>
                            <font size="4">Procesos</font>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Solicitudes</font>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(\Auth::user()->roles()->first()->id == 4)
                                <li class="nav-item">
                                    <a href="{{route('process.request.index',Auth::user()->roles()->first()->id)}}" class="nav-link">
                                        <i class="icofont-checked"></i>
                                        <p>Mis solicitudes</p>
                                    </a>
                                </li>
                                @endif
                                @if(\Auth::user()->roles()->first()->id != 4)
                                <li class="nav-item">
                                    <a href="{{route('process.request.index',Auth::user()->roles()->first()->id)}}" class="nav-link">
                                        <i class="icofont-close-squared-alt"></i>
                                        <p>List. Solicitudes</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @if(\Auth::user()->roles()->first()->id !=4)
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Cotizaciones</font>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(\Auth::user()->roles()->first()->id == 6)
                                <li class="nav-item">
                                    <a href="{{route('process.quotes.index')}}" class="nav-link">
                                        <i class="icofont-checked"></i>
                                        <p>Mis Cotizaciones</p>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="{{route('process.request.list')}}" class="nav-link">
                                        <i class="icofont-close-squared-alt"></i>
                                        <p>List. cotizaciones</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(\Auth::user()->roles()->first()->id !=4)
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Trabajos</font>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(\Auth::user()->roles()->first()->id == 6)
                                <li class="nav-item">
                                    <a href="{{route('process.works.index')}}" class="nav-link">
                                        <i class="icofont-checked"></i>
                                        <p>Mis trabajos</p>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="{{route('process.works.list')}}" class="nav-link">
                                        <i class="icofont-close-squared-alt"></i>
                                        <p>List. trabajos</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Entregables</font>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(\Auth::user()->roles()->first()->id == 6 || \Auth::user()->roles()->first()->id == 4)
                                <li class="nav-item">
                                    <a href="{{route('process.deliverables.index')}}" class="nav-link">
                                        <i class="icofont-checked"></i>
                                        <p>Mis entregables</p>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="{{route('process.deliverables.list')}}" class="nav-link">
                                        <i class="icofont-close-squared-alt"></i>
                                        <p>List. entregables</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>


                @can('Billetera_virtual')
                <!-- /.Modulo Pre Registro -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icofont-wallet"></i>
                        <p>
                            <font size="4">Billetera Virtual</font>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if((\Auth::user()->roles()->first()->id == 6))
                        @can('Billetera_virtual_miBilletera_ver')
                        <li class="nav-item">
                            <a href="{{route('wallet.index','mi_billetera')}}" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Mi Billetera</font>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @else
                        @can('Billetera_virtual_HistoriarPagos_ver')
                        <li class="nav-item">
                            <a href="{{route('wallet.index')}}" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Hist. Pagos a tutores</font>
                                </p>
                            </a>
                        </li>
                        @endif
                        @endcan
                    </ul>
                </li>
                @endcan

                @if((\Auth::user()->roles()->first()->id != 6))
                @can('Pagos')
                <!-- /.Modulo Pre Registro -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icofont-coins"></i>
                        <p>
                            <font size="4">Pagos</font>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if((\Auth::user()->roles()->first()->id == 4))
                        @can('Pagos_HistorialPagosClientes_ver')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Mis Pagos</font>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @else
                        <li class="nav-item">
                            <a href="{{route('payment.index')}}" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Hist. Pagos</font>
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endcan
                @endif
                @if((\Auth::user()->roles()->first()->id != 4) || (\Auth::user()->roles()->first()->id != 6))
                @can('Reportes')
                <!-- /.Modulo Pre Registro -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icofont-tasks"></i>
                        <p>
                            <font size="4">Reportes</font>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('Reportes_Listado_ver')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Listado de Reportes</font>
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @endif

                @can('Perfil')
                <!-- /.Modulo Pre Registro -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icofont-teacher"></i>
                        <p>
                            <font size="4">Configuraciones</font>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if((\Auth::user()->roles()->first()->id == 4 || \Auth::user()->roles()->first()->id == 6) && (\Auth::user()->u_state == 2))
                        @can('Perfil_datosBasicos_ver')
                        <li class="nav-item">
                            <a href="{{route('profile.index_basic_data',\Auth::user()->id)}}" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Mi Perfil</font>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @else
                        <li class="nav-item">
                            <a href="{{route('profile.list_basic_data',\Auth::user()->id)}}" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Solicitud de Usuario</font>
                                </p>
                            </a>
                        </li>
                        @can('Perfil_bonos_ver')
                        <li class="nav-item">
                            <a href="{{route('profile.index_bonds',1)}}" class="nav-link">
                                <i class="icofont-bill-alt"></i>
                                <p>
                                    <font size="3">Asignación de Bonos</font>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @endif
                        <li class="nav-item">
                            <a href="{{route('profile.change_password',\Auth::user()->id)}}" class="nav-link">
                                <i class="icofont-data"></i>
                                <p>
                                    <font size="3">Mi contraseña</font>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @can('Comunicaciones')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icofont-phone"></i>
                        <p>
                            <font size="4">Comunicaciones</font>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if((\Auth::user()->roles()->first()->id != 6))
                        @can('Comunicaciones_bandeja')
                        <li class="nav-item">
                            <a href="{{route('communications.index')}}" class="nav-link">
                                <i class="icofont-ui-browser"></i>
                                <p>
                                    <font size="2">Comunicaciones de Solicitudes</font>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @endif

                        <li class="nav-item">
                            <a href="{{route('admin_process.index')}}" class="nav-link">
                                <i class="icofont-ui-browser"></i>
                                <p>
                                    <font size="2">Comunicaciones Administrativas</font>
                                </p>
                            </a>
                        </li>

                        @if((\Auth::user()->roles()->first()->id != 4) && (\Auth::user()->roles()->first()->id != 6))
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="icofont-ui-browser"></i>
                                <p>
                                    <font size="2">Comunicaciones Internas</font>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @endif
                <!-- /.Modulo Comunicaciones -->
            </ul>
            @endif
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
