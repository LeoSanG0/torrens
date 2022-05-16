<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Home</span>
    </a>
    @can('users.show')
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    @can ('show.roles')
    <a class="nav-link" href="{{ route('roles.index')}}">
        <i class="fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan
    <a class="nav-link" href="{{ route('tasks.index') }}">
        <i class="fas fa-clipboard-list"></i><span>Tareas</span>
        <span class="notification-tasks"></span>
    </a>
</li>
