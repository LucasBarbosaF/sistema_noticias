<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-weight: 600;
            color: #333;
        }

        .form-group label {
            font-weight: 500;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 15px;
        }

        .btn-secondary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .text-center {
            margin-top: 20px;
        }

        .navbar {
            padding: 0.8rem 1.5rem;
        }

        .navbar-logo img {
            height: 40px;
        }

        .navbar-nav a {
            font-weight: 600;
            color: #333;
        }

        .navbar-nav a:hover {
            color: #007bff;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn-search {
            border-radius: 20px;
            padding: 0.4rem 1rem;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
    </style>
    @yield('app_styles')
</head>

<body>

    <header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <!-- Logo no canto esquerdo -->
            <div class="navbar-logo">
                <span>LOGO</span>
            </div>

            <!-- Menu no meio -->
            @if (auth()->check())
                <div class="collapse navbar-collapse justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categoria.create') }}">Cadastrar Categoria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('noticia.create') }}">Cadastrar Noticia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('noticia.index') }}">Exibir Noticias</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('autenticacao.logout') }}">
                                @csrf
                                <button type="submit" class="nav-link">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="collapse navbar-collapse justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('autenticacao.login.index') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('noticia.index') }}">Exibir Noticias</a>
                        </li>
                    </ul>
                </div>
            @endif
            <form method="GET" action="{{ route('noticia.index') }}">
                <div class="d-flex">
                    <input class="form-control me-2" type="search" name="search" placeholder="Buscar"
                        aria-label="Buscar" value="{{ request()->get('search') }}">
                    <button type="submit" class="btn btn-outline-primary btn-search">Buscar</button>
                </div>
            </form>
        </div>
    </header>
    @yield('app_content')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
