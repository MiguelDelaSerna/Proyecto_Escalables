<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistema de Renta de Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #1b1f24, #2b2f35);
            color: #f8f9fa;
        }

        header {
            background: #2b3a42;
            color: #ffbf00; /* Texto dorado */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1em 2em;
            border-bottom: 3px solid #ffbf00;
        }

        .header-left a,
        .header-right a {
            color: #ffbf00;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .header-left a:hover,
        .header-right a:hover {
            color: #fff;
        }

        .header-center h1 {
            font-size: 1.5rem;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1em;
        }

        nav ul li {
            display: inline-block;
        }

        main {
            padding: 2em;
        }

        footer {
            background: #2b3a42;
            color: #ffbf00;
            text-align: center;
            padding: 0.1em; /* Reducido de 1em a 0.5em */
            border-top: 3px solid #ffbf00;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        footer p {
            font-size: 0.7rem; /* Ajusta el tamaño de la fuente */
        }


        .btn-primary {
            background-color: #ffbf00;
            border: none;
            color: #1b1f24;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #d4a500;
            color: #1b1f24;
        }
    </style>
</head>
<body>
    <header>
        <!-- Izquierda: Home -->
        <div class="header-left">
            <nav>
                <ul>
                    <li>
                        <a href="
                            @php
                                // Determina el enlace de Home según el rol del usuario
                                if (session('usuario')->rol === 'administrador') {
                                    echo route('admin.dashboard');
                                } elseif (session('usuario')->rol === 'empleado') {
                                    echo route('empleado.dashboard');
                                } else {
                                    echo route('cliente.dashboard');
                                }
                            @endphp
                        ">
                            Home
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Centro: Nombre del Sistema -->
        <div class="header-center">
            <h1>Sistema de Renta de Videojuegos</h1>
        </div>

        <!-- Derecha: Cerrar Sesión -->
        <div class="header-right">
            <nav>
                <ul>
                    <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Renta de Videojuegos</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
