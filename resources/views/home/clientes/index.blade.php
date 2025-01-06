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

    @if ($success_delete = Session::get('success_delete_cliente'))
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
                                <form action="{{route('EliminarCliente', $cliente['id'])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </main>

<!-- Footer componente -->
<x-FooterLayaout></x-FooterLayaout>