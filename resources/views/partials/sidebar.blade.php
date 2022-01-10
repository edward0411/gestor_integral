<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @can('Administrador')         
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
                  <p><font size="3">Clientes</font></p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('customers.index')}}" class="nav-link">
                      <i class="icofont-users-alt-2"></i>
                      <p>Clientes Activos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('customers.inactives')}}" class="nav-link">
                      <i class="icofont-users-alt-2"></i>
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
                      <i class="icofont-users-alt-5"></i>
                      <p>Tutores Activos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('tutors.index')}}" class="nav-link">
                      <i class="icofont-users-alt-5"></i>
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
          <!-- /.Modulo Administrador -->
        @endcan
        @can('Preregistro')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="icofont-education"></i>
              <p>
               <font size="4">Pre Registros</font>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Preregistro_historial_ver')
              <li class="nav-item">
                <a href="{{route('histories.index_tutors')}}" class="nav-link">
                  <i class="icofont-paper"></i>
                  <p><font size="3">Historial</font></p>
                </a>
              </li>
              @endcan    
              @can('Preregistro_listado_ver')        
              <li class="nav-item">
                <a href="{{route('histories.index')}}" class="nav-link">
                  <i class="icofont-paper"></i>
                  <p><font size="3">Listado</font></p>
                </a>
              </li>
              @endcan            
            </ul>
          </li>
          @endcan
          @can('Cotizaciones')
          <!-- /.Modulo Pre Registro -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="icofont-teacher"></i>
              <p>
               <font size="4">Cotizaciones</font>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Cotizaciones_pendientes_ver')
              <li class="nav-item">
                <a href="{{route('quotes.index')}}" class="nav-link">
                  <i class="icofont-data"></i>
                  <p><font size="3">Cot. Pendientes</font></p>
                </a>
              </li>
              @endcan
              @can('Cotizaciones_historial_ver')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="icofont-bill-alt"></i>
                  <p><font size="3">Historial de Cotizaciones</font></p>
                </a>
              </li> 
              @endcan
              @can('Cotizaciones_misCotizaciones_ver')
              <li class="nav-item">
                <a href="{{route('quotes.myQuotes')}}" class="nav-link">
                  <i class="icofont-bill-alt"></i>
                  <p><font size="3">Mis Cotizaciones</font></p>
                </a>
              </li> 
              @endcan
            </ul>
          </li>
          @endcan
          @can('Billetera_virtual')
          <!-- /.Modulo Pre Registro -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="icofont-teacher"></i>
              <p>
               <font size="4">Billetera Virtual</font>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Billetera_virtual_miBilletera_ver')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="icofont-data"></i>
                  <p><font size="3">Mi Billetera</font></p>
                </a>
              </li>
              @endcan
              @can('Billetera_virtual_HistoriarPagos_ver')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="icofont-data"></i>
                  <p><font size="3">Hist. Pagos a tutores</font></p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('Pagos')
          <!-- /.Modulo Pre Registro -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="icofont-teacher"></i>
              <p>
               <font size="4">Pagos</font>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Pagos_HistorialPagosClientes_ver')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="icofont-data"></i>
                  <p><font size="3">Hist. Pagos</font></p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('Reportes')
          <!-- /.Modulo Pre Registro -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="icofont-teacher"></i>
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
                  <p><font size="3">Listado de Reportes</font></p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('Perfil')
          <!-- /.Modulo Pre Registro -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="icofont-teacher"></i>
              <p>
               <font size="4">Mi Perfil</font>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Perfil_datosBasicos_ver')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="icofont-data"></i>
                  <p><font size="3">Datos básicos</font></p>
                </a>
              </li>
              @endcan
              @can('Perfil_bonos_ver')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="icofont-bill-alt"></i>
                  <p><font size="3">Bonos</font></p>
                </a>
              </li> 
              @endcan
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
              @can('Comunicaciones_bandeja')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="icofont-data"></i>
                  <p><font size="2">Bandeja de comunicaciones</font></p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          <!-- /.Modulo Comunicaciones -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>