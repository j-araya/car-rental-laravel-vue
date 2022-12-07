<html>
    <head >
        <title>@yield('title')</title>

        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
     </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light border">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav container-fluid d-flex justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/car">Carros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Iniciar Sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Registrarse</a>
                    </li>
                </ul>
              </div>
            <ul class="d-flex justify-content-center">
            </ul>
        </nav>

    @yield('content')

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>