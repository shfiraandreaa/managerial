<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
      <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="{{asset('public/assets/brand/coreui.svg#full')}}"></use>
      </svg>
      <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="{{asset('public/assets/brand/coreui.svg#signet')}}"></use>
      </svg>
    </div>
      <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('dashboard')}}">
            <i class="c-sidebar-nav-icon fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('category.index')}}">
            <i class="c-sidebar-nav-icon fas fa-ellipsis-h"></i> Category</a>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('task.index')}}">
            <i class="c-sidebar-nav-icon fas fa-tasks"></i> Task</a>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user.index')}}">
            <i class="c-sidebar-nav-icon fas fa-users"></i> User Management</a>
        </li>
      </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
  </div>