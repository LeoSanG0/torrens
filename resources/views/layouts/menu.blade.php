<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Home</span>
    </a>
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    <a class="nav-link" href="{{ route('roles.index')}}">
        <i class="fas fa-user-lock"></i><span>Roles</span>
    </a>
    <a class="nav-link" href="{{ route('tasks.index') }}">
        <i class="fas fa-clipboard-list"></i><span>Tareas</span>
    </a>
</li>
