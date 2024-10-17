<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar min-vh-100">
    <div class="position-sticky p-3 d-flex flex-column" style="height: 100vh;">
        <div class="logo mb-2">
            <h1 class="text-center">TANYM</h1>
        </div>
        <div class="flex-grow-1">
            @can('isRoot', \App\Models\User::class)
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('words.index') ? 'active' : '' }}" href="{{ route('words.index') }}">
                            <i class="fas fa-book"></i> {{ __('Words') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('letters.index') ? 'active' : '' }}" href="{{ route('letters.index') }}">
                            <i class="fas fa-font"></i> {{ __('Letters') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('numbers.index') ? 'active' : '' }}" href="{{ route('numbers.index') }}">
                            <i class="fas fa-hashtag"></i> {{ __('Numbers') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('modes.index') ? 'active' : '' }}" href="{{ route('modes.index') }}">
                            <i class="fas fa-cogs"></i> {{ __('Modes') }}
                        </a>
                    </li>
                </ul>
            @endcan
            @can('isTeacher', \App\Models\User::class)
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('groups.index') ? 'active' : '' }}" href="{{ route('groups.index') }}">
                            <i class="fas fa-users"></i> {{ __('Groups') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                            <i class="fas fa-tasks"></i> {{ __('Tasks') }}
                        </a>
                    </li>
                </ul>
            @endcan
        </div>
        <div class="logout-container py-5">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link logout-link">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .sidebar {
        background-color: #f8f9fa;
        border-right: 1px solid #ddd;
    }
    .logo {
        color: #333;
    }
    .logout-container {
        margin-top: auto;
        position: sticky;
        bottom: 0;
        background-color: #f8f9fa;
    }
    .nav-link {
        color: #333;
        font-weight: 500;
        padding: 0.75rem 1rem;
        display: flex;
        align-items: center;
    }
    .nav-link i {
        margin-right: 0.5rem;
    }
    .nav-link.active {
        background-color: #007bff;
        color: #fff;
        border-radius: 0.25rem;
        cursor: default;
    }
    .nav-link.active:hover {
        background-color: #007bff;
        color: #fff;
    }
    .nav-link:hover:not(.active) {
        background-color: #e9ecef;
        color: #007bff;
        border-radius: 0.25rem;
    }
    .logout-link {
        color: #fff;
        background-color: #dc3545;
        border-radius: 0.25rem;
        padding: 0.75rem 1rem;
        display: flex;
        align-items: center;
        text-decoration: none;
        border: none;
        width: auto;
        text-align: left;
    }

    .logout-link:hover {
        background-color: #c82333;
        color: #fff;
    }

    .logout-container {
        margin-top: auto;
        position: sticky;
        bottom: 0;
        background-color: #f8f9fa;
        padding-right: 0;
    }

</style>
