<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>Julie Nikonorova, test tasks - @yield('title')</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @section('sidebar')
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/tasks">Julie Nikonorova, test tasks</a>
                    <div class="vr"></div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/tasks/1">Task 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tasks/2">Task 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tasks/3">Task 3</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @show

        <div class="container">
            @hasSection('comment')
                <div>
                    <div class="card card-body">
                        @yield('comment')
                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </body>
</html>
