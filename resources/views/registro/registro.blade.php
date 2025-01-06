<!doctype html>
<html lang="es">

<head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
        <style>
            body{
                background-color: #fafafa;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            .frm-registro{
                width: 500px;
            }
        </style>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>

        <!-- Login -->

          <!--respuestas de la validación-->
        @if ($errors->any())
            <div class="mt-3 w-75 mx-auto alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container frm-registro">
            <h2>Crear una cuenta</h2>
            <small class="p-2 bg-warning mb-3 rounded">Al registrar su cuenta, deberá ser <b>aprobada</b> por el administrador.</small>
            <form method="POST" action="{{ route('registro') }}"
                class="rounded bg-white mx-auto shadow-sm mt-4 p-3">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="nombre cliente" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="alguien@gmail.com" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Tu contraseña debe tener al menos 7 dígitos" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Confirmar la contraseña</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirma tu contraseña" />
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" id="ok_submit" value="Crear mi cuenta" />

                    <a class="btn btn-primary" href="{{ route('form_login') }}">Ingresa</a>
                </div>

            </form>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
