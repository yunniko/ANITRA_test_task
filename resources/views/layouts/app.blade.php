<!-- Stored in resources/views/layouts/app.blade.php -->
<?php

$nav = [
    '/tasks/1' => 'Task 1',
    '/tasks/2' => 'Task 2',
    '/tasks/3' => 'Task 3',
];

?>
<html>
<head>
    <title>Julie Nikonorova, test tasks - @yield('title')</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@section('sidebar')
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Julie Nikonorova, test tasks</a>
            <div class="vr mx-2"></div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @foreach($nav as $url => $urlName)
                        <li class="nav-item">
                            <a class="nav-link{{ (url()->current() == url()->to($url)) ? ' active border-bottom border-dark' : '' }}"
                               href="{{ $url }}">{{ $urlName }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
@show

<div class="container">
    @hasSection('comment')
        <div class="py-2">
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#commentBody" aria-expanded="false" aria-controls="collapseExample">
                Read comments to the task
            </button>
        </div>
        <div class="py-3 collapse" id="commentBody">
            @yield('comment')
        </div>
    @endif

    <div class="py-3">
        @yield('content')
    </div>
</div>
</body>
</html>
