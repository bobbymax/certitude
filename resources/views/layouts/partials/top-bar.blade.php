<nav class="navbar top-navbar navbar-expand">
    <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <form class="nav-search-form d-none ml-auto d-md-block">
            <label><i class='bx bx-search'></i></label>
            <input type="text" class="form-control" placeholder="Search here...">
        </form>

        <ul class="navbar-nav right-nav align-items-center">

            <li class="nav-item notification-box dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="notification-btn">
                        <i class='bx bx-bell'></i>

                        <span class="badge badge-secondary">5</span>
                    </div>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex justify-content-between align-items-center">
                        <span class="title d-inline-block">6 New Notifications</span>
                        <span class="mark-all-btn d-inline-block">Mark all as read</span>
                    </div>

                    <div class="dropdown-body">
                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class='bx bx-message-rounded-dots'></i>
                            </div>

                            <div class="content">
                                <span class="d-block">Just sent a new message!</span>
                                <p class="sub-text mb-0">2 sec ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class='bx bx-user'></i>
                            </div>

                            <div class="content">
                                <span class="d-block">New customer registered</span>
                                <p class="sub-text mb-0">5 sec ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class='bx bx-layer'></i>
                            </div>

                            <div class="content">
                                <span class="d-block">Apps are ready for update</span>
                                <p class="sub-text mb-0">3 min ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class='bx bx-hourglass'></i>
                            </div>

                            <div class="content">
                                <span class="d-block">Your item is shipped</span>
                                <p class="sub-text mb-0">7 min ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class='bx bx-comment-dots'></i>
                            </div>

                            <div class="content">
                                <span class="d-block">Steven commented on your post</span>
                                <p class="sub-text mb-0">1 sec ago</p>
                            </div>
                        </a>
                    </div>

                    <div class="dropdown-footer">
                        <a href="#" class="dropdown-item">View All</a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown profile-nav-item">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="menu-profile">
                        <span class="name">Hi! {{ auth()->user()->name }}</span>
                        <img src="/assets/img/user1.jpg" class="rounded-circle" alt="image">
                    </div>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="/assets/img/user1.jpg" class="rounded-circle" alt="image">
                        </div>

                        <div class="info text-center">
                            <span class="name">{{ auth()->user()->name }}</span>
                            <p class="mb-3 email">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-user'></i> <span>Profile</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-envelope'></i> <span>My Inbox</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-edit-alt'></i> <span>Edit Profile</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-cog'></i> <span>Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown-footer">
                        <ul class="profile-nav">
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out'></i> <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>