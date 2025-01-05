<!-- Header componente -->
<x-HeaderLayaout></x-HeaderLayaout>

        <main class="container mt-3">
    @if ($success = Session::get('success_cliente'))
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
            <h1>Listado de clientes</h1>

            <div
                class="table-responsive"
            >
                 <a class="btn btn-primary mb-3" href="{{route('create_clientes')}}">Agregar cliente</a>
                <table
                    class="table table-primary"
                >
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody> 
                       
                        @foreach ($clientes as $cliente)
                        <tr class="">
                            <td scope="row">{{$cliente['nombre']}}</td>
                            <td>{{$cliente['email']}}</td>
                            <td>{{$cliente['telefono']}}</td>
                            <td>
                                <div class="group d-flex">
                                    <form action="{{route('aprobar_usuario',      $cliente['id'] )
                                        }}" method="post">
                                        @csrf
                                        <input class="btn btn-primary" type="submit" value="Aprobar">
                                    </form>
                                    <a href="" class="btn btn-danger">Eliminar</a>
                                    <a href="" class="btn btn-success">Actualizar</a>
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