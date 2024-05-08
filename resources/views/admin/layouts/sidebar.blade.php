<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light me-4 ">Job portal dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('avatar/man.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link {{ request()->is('jobs') ? 'active' : '' }}">
                <i class="nav-icon fas fa-server"></i>
                <p>
                    Dashboord
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.jobs') }}" class="nav-link {{ request()->is('jobs') ? 'active' : '' }}">
                <i class="nav-icon fas fa-server"></i>
                <p>
                    Liste des offres d'emplois
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.applicants') }}" class="nav-link {{ request()->is('trash') ? 'active' : '' }}">
                <i class="nav-icon fas fa-server"></i>
                <p>
                    Liste des candidatures
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.company.create') }}" class="nav-link {{ request()->is('trash') ? 'active' : '' }}">
                    <i class=" nav-icon fas fa-plus"></i>
                <p>
                   New Company
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link {{ request()->is('trash') ? 'active' : '' }}">
                <i class="nav-icon fas fa-server"></i>
                <p>
                    Liste des Utilisateurs
                </p>
                </a>
            </li>



          {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
