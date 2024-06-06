<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href=""></a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>
        <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i>
                <span>Dropdown Menu</span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Dropdown Item</a></li>
            </ul>
        </li> --}}

        {{-- @can('admin') --}}
        <li class="menu-header">Administrator</li>
        <li class="{{ Route::is('user*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-users"></i>
                <span>Manage Users</span>
            </a>
        </li>
        <li class="{{ Route::is('bidang*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('bidang.index') }}">
                <i class="fas fa-users"></i>
                <span>Manage Bidang</span>
            </a>
        </li>

        <li class="nav-item dropdown {{ Route::is('rapat*', 'laporan*') ? 'active' : '' }}  ">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i>
                <span>Kelola Rapat</span>
            </a>
            <ul class="dropdown-menu">
                <li class="{{ Route::is('rapat*') ? 'active' : '' }}"><a href="{{ route('rapat.index') }}">Jadwal Rapat</a></li>
                <li class="{{ Route::is('laporan*') ? 'active' : '' }}"><a href="{{ route('laporan.index') }}">Laporan</a></li>
            </ul>
        </li>
        {{-- @endcan --}}
    </ul>
</aside>
