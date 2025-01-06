<!doctype html>
<html lang="en">

<head>
    <title>Usuarios</title>
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
        <nav class="nav bg-white shadow-sm  justify-content-center">
            <a class="nav-link active" href="{{ route('home') }}" aria-current="page">Dashboard</a>
            @if(Auth::user()->id == 1) 
                  <a class="nav-link" href="{{ route('usuarios') }}">Listado de usuarios</a>
            @endif
            <a class="nav-link" href="{{route('listar_clientes')}}">Clientes</a>
        </nav>
    </header>
