<!-- Header componente -->
<x-HeaderLayaout></x-HeaderLayaout>

<main class="container mt-3 mb-3">
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

    @if($success = Session::get('success'))
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
    
    
    <form class="mt-5 bg-white shadow-sm rounded p-3 w-75 mx-auto" action="{{ route('mi_cuenta_update', $usuario->id) }}"
        method="post">
        <h2>Editar mis datos</h2>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Nombre</label>
            <input class="form-control" type="text" value="{{ $usuario->name }}" name="name">
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input class="form-control" type="email" value="{{ $usuario->email }}" name="email">
        </div>

        <div class="mb-3">
            <label for="">Contraseña</label>
            <input class="form-control" type="password" placeholder="*******" name="password">
        </div>

        <div class="mb-3">
            <label for="">Confirmar contraseña</label>
            <input class="form-control" type="password" placeholder="Confirmar contraseña" name="password_confirmation">
        </div>

        <div class="container">
            <input value="Actualizar" type="submit" class="btn btn-primary">
            <a href="{{route('home')}}" class="btn btn-primary">Regresar</a>
        </div>
    </form>
</main>

<!-- Footer componente -->
<x-FooterLayaout></x-FooterLayaout>
