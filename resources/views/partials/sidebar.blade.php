<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{ asset('image/logo.jpg') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gestor Integral</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Administrador
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tutors.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tutores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comerciales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monitores</p>
                </a>
              </li>          
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('countries.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Países</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('parametrics.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paramétricas</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{route('coins.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monedas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('areas.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
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