<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.home') }}" class="brand-link">
    <img src="{{asset('adminlt/dist/img/AdminLTELogo.png')}}" alt="Company Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>
  
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('adminlt/dist/img/masud-rana.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="" class="d-block">Masud Rana</a>
      </div>
    </div>
    
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          {{-- Users Module --}}
          <li class="nav-item menu">
            <a href="{{ route('admin.users.index') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User Manager
              </p>
            </a>
          </li>
            {{-- Category --}}
            <li class="nav-item menu">
              <a href="{{ route('admin.categories.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Category Manager
                </p>
              </a>
            </li>

          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>