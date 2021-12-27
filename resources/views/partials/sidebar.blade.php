<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <center>
        <img src="{{ asset('dist/img/logo.jpg') }}" alt="" style="opacity: .8">
      </center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->u_nickname }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="icofont-lock"></i>
              <p>
               <font size="4">Administrador</font>  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
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
              <li class="nav-item">
                <a href="{{route('tutors.index')}}" class="nav-link">
                  <i class="icofont-users-alt-5"></i>
                  <p>Tutores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('employees.index')}}" class="nav-link">
                  <i class="icofont-people"></i>
                  <p>Empleados</p>
                </a>
              </li>         
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="icofont-users-alt-3"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('countries.index')}}" class="nav-link">
                  <i class="icofont-earth"></i>
                  <p>Países</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('parametrics.index')}}" class="nav-link">
                  <i class="icofont-chart-flow"></i>
                  <p>Paramétricas</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{route('coins.index')}}" class="nav-link">
                  <i class="icofont-coins"></i>
                  <p>Monedas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('areas.index')}}" class="nav-link">
                  <i class="icofont-education"></i>
                  <p>Áreas</p>
                </a>
              </li>
            </ul>
          </li>
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>