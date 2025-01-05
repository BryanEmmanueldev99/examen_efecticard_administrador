<!-- Header componente -->
<x-HeaderLayaout></x-HeaderLayaout>

    <main class="container mt-3">

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
    @endif

        <h1>Bienvenido {{ auth()->user()->name }} </h1>

        <div class="container mt-3">
            <form action="{{ route('cerrar_sesion') }}" method="post">
                @csrf
                <a href="{{route( 'mi_cuenta', auth()->user()->id )}}" class="btn btn-primary">Editar mis datos</a>
                <input class="btn btn-primary" type="submit" value="cerrar sesion">
            </form>
        </div>
    </main>
 
<!-- Footer componente -->
<x-FooterLayaout></x-FooterLayaout>
