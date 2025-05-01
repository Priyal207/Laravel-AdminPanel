<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> {{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
    </a>


    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">  {{ Auth::check() ? Auth::user()->name : 'Guest' }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p> Users </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
              <i class="nav-icon fas fa-roles"></i>
              <p> Roles </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('permission.index') }}" class="nav-link">
              <i class="nav-icon fas fa-roles"></i>
              <p> Permission </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('assignPermissionRole') }}" class="nav-link">
              <i class="nav-icon fas fa-roles"></i>
              <p> Assign Permission Role</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('posts.index') }}" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p> Posts </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
</aside>