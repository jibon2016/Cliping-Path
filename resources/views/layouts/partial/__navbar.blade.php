<nav class="main-header navbar navbar-expand {{ auth()->user()->theme_mode == 1 ? 'navbar-white' : 'navbar-dark' }}  navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <h3 class="nav-link font-weight-bold active"
                style="color: #007bff;font-size: 22px;margin: 0">{{ config('app.name') }}
            </h3>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('database-backups.index') }}">
                <i class="fa fa-database"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">{{ count(auth()->user()->unreadNotifications) > 99 ? '99+' : count(auth()->user()->unreadNotifications) }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notification-area-custom">
                <a role="button" class="dropdown-item dropdown-footer"><b>Notifications</b></a>

                <div id="notification-container"></div>
                @if (count(auth()->user()->unreadNotifications) <= 1)
                    <div class="dropdown-divider"></div>
                @endif
                <a href="{{ route('notification') }}" class="dropdown-item dropdown-footer">See All Notification</a>

            </div>

        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <img height="30" class="img-circle" src="{{ asset(auth()->user()->profile_photo ?? 'themes/backend/dist/img/avatar.png') }}"
                     alt=""> {{ auth()->user()->name ?? '' }} <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <a href="{{ route('profile.password_change') }}" class="dropdown-item">
                    <i class="fas fa-lock mr-2"></i> Change Password
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>
