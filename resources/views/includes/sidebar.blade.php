<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar min-vh-100">
    <div class="position-sticky">
        @can('isRoot', \App\Models\User::class)
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('words.index') }}">
                        {{ __('Words') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('letters.index') }}">
                        {{ __('Letters') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('numbers.index') }}">
                        {{ __('Numbers') }}
                    </a>
                </li>
            </ul>
        @endcan
        @can('isTeacher', \App\Models\User::class)
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('groups.index') }}">
                            {{ __('Groups') }}
                        </a>

                        <a class="nav-link active" href="{{ route('tasks.index') }}">
                            {{ __('Tasks') }}
                        </a>
                    </li>
                </ul>
        @endcan
    </div>
</nav>
