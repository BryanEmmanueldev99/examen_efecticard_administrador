<!-- Header componente -->
<x-HeaderLayaout></x-HeaderLayaout>

<main class="container mt-3 mb-3">
    
     <!-- respuestas de la validación del otro sistema -->
@if($errors = Session::get('errors'))
  <div class="mt-3 w-75 mx-auto alert alert-danger">
    <ul class="m-0">
        @foreach ($errors as $error)
           @foreach ($error as $input)
              <li> {{ $input }} </li>
           @endforeach
        @endforeach
    </ul>
  </div>
 @endif
    
    <form class="mt-5 bg-white shadow-sm rounded p-3 w-75 mx-auto" action="{{ route('NuevoCliente') }}"
        method="post">
        <h2>Registrar cliente</h2>
        @csrf

        <div class="mb-3">
            <label for="">Nombre</label>
            <input class="form-control" type="text" name="nombre">
        </div>

        <div class="mb-3">
            <label for="">Telefono</label>
            <input class="form-control" type="number" name="telefono">
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input class="form-control" type="email" name="email">
        </div>


        <div class="container">
            <input value="Actualizar cliente" type="submit" class="btn btn-primary">
            <a href="{{route('listar_clientes')}}" class="btn btn-primary">Regresar</a>
        </div>
    </form>
</main>

<!-- Footer componente -->
<x-FooterLayaout></x-FooterLayaout>
