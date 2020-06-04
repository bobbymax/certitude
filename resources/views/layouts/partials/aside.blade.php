<div class="sidemenu-area">
    <div class="sidemenu-header">

        <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center">
            <img src="/logo.jpg" alt="image" width="22%">
            <span>Certitude</span>
        </a>

        <div class="burger-menu d-none d-lg-block">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
        
    </div>

    <div class="sidemenu-body">
        <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>

            @foreach ($menus as $menu)
                @can('view', $menu)
                    <li class="nav-item-title">
                        {{ $menu->name }}
                    </li>

                    @foreach ($menu->items as $navigation)
                        @can('view', $navigation)
                            @if ($navigation->parent_id == 0)
                                <li class="nav-item">
                                    <a href="{{ ! $navigation->hasChildren() ? route($navigation->route) : '#' }}" class="{{ $navigation->hasChildren() ? 'collapsed-nav-link ' : '' }}nav-link" aria-expanded="false">
                                        <span class="icon"><i class="bx {{ $navigation->icon_class }}"></i></span>
                                        <span class="menu-title">{{ $navigation->name }}</span>
                                        @if ($navigation->hasChildren())
                                            <span class="badge">{{ $navigation->children->count() }}</span>
                                        @endif
                                    </a>

                                    @if ($navigation->hasChildren())
                                        <ul class="sidemenu-nav-second-level">
                                            @foreach ($navigation->children as $child)
                                                <li class="nav-item">
                                                    <a href="{{ route($child->route) }}" class="nav-link">
                                                        <span class="icon"><i class='bx {{ $child->icon_class }}'></i></span>
                                                        <span class="menu-title">{{ $child->name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul> 
                                    @endif
                                </li>
                            @endif
                        @endcan
                    @endforeach
                @endcan
            @endforeach

            <li class="nav-item-title">
                Tools
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class="bx bx-food-menu"></i></span>
                    <span class="menu-title">Navigation</span>
                    <span class="badge">2</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="{{ route('menus.index') }}" class="nav-link">
                            <span class="icon"><i class="bx bx-menu"></i></span>
                            <span class="menu-title">Menus</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('navigations.index') }}" class="nav-link">
                            <span class="icon"><i class="bx  bx-menu-alt-right"></i></span>
                            <span class="menu-title">Items</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class="bx bx-command"></i></span>
                    <span class="menu-title">Administration</span>
                    <span class="badge">2</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <span class="icon"><i class="bx bx-cycling"></i></span>
                            <span class="menu-title">Roles</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <span class="icon"><i class="bx bxs-user"></i></span>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>