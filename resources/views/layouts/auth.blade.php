<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>@yield('title')</title>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center mb-4">@yield('title')</h3>
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
