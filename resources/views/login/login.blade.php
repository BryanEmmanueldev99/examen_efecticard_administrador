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
    <!--Sweet Alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        @if ($success = Session::get('success'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ $success }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @elseif ($error_login = Session::get('error_login'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "{{ $error_login }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif

        @if ($success_prelogin = Session::get('success_prelogin'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "info",
                    title: "{{ $success_prelogin }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif

        @if ($error_provider = Session::get('error_provider'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "{{ $error_provider }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif
        <!-- Login -->
        <div class="container">
            <form method="POST" action="{{ route('login') }}" class="rounded container w-50 mx-auto shadow-sm mt-5 p-3">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="alguien@gmail.com" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="*******" />
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" id="ok_submit" value="Ingresar" />

                    <a class="btn btn-primary" href="{{ route('form_registro') }}">Crear una cuenta</a>
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
