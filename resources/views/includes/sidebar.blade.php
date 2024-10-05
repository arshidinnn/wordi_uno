<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar min-vh-100">
    <div class="position-sticky">
        @can('isRoot', \App\Models\User::class)
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        Words
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Letters
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Numbers
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>
