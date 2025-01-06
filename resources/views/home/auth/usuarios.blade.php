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
    @elseif($success_delete = Session::get('success_delete'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ $success_delete }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    <h1>Listado de usuarios</h1>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Verified</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr class="">
                        <td scope="row">{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->verified }}</td>
                        <td>
                            <div class="group d-flex">
                                <form action="{{ route('aprobar_usuario', $usuario->id) }}" method="post">
                                    @csrf
                                    <input class="btn btn-primary" type="submit" value="Aprobar">
                                </form>
                                <form action="{{ route('EliminarUsuario', $usuario->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                </form>
                                <a href="{{ route('user_edit', $usuario->id) }}" class="btn btn-success">Actualizar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</main>

<!-- Footer componente -->
<x-FooterLayaout></x-FooterLayaout>
