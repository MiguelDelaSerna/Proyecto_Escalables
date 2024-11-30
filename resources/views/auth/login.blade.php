<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        body {
            background-color: #2b3a42; /* Fondo oscuro */
            color: #f4c542; /* Texto dorado */
        }

        .card {
            background-color: #2b3a42;
            border: none;
            color: #f4c542; /* Texto dorado */
        }

        .card-header {
            background-color: #343a40; /* Fondo más oscuro para el encabezado */
            color: #f4c542; /* Texto dorado */
        }

        .form-label {
            color: #f4c542; /* Etiquetas en dorado */
        }

        .btn-primary {
            background-color: #ffbf00; /* Botón dorado */
            border: none;
        }

        .btn-primary:hover {
            background-color: #d4a500; /* Hover en dorado más oscuro */
        }

        .alert-danger {
            background-color: #343a40; /* Fondo oscuro para mensajes de error */
            color: #f4c542; /* Texto dorado */
            border: 1px solid #f4c542; /* Borde dorado */
        }

        .card-body {
            border: 1px solid #343a40; /* Borde para la tarjeta */
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <div class="card-header text-center">
                <h2>Iniciar Sesión</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <!-- Campo de Correo -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa tu correo" required>
                    </div>

                    <!-- Campo de Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                    </div>

                    <!-- Botón de Iniciar Sesión -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>

                <!-- Mensajes de error -->
                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <p class="mb-0">{{ $errors->first() }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opcional, para funcionalidades como modales o tooltips) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
