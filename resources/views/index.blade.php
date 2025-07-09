@extends('up_down.header')

@section('content')

  <div class="container">
    <br>
      <div class="panel panel-default">
        <div class="panel-body">
          <table class='table'>
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Extensión</th>
                <th scope="col">Gerencia</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
                  <tbody>
                    @foreach ($workers as $empleados)
                    <tr>
                      <th scope="row">
                        {{ $empleados->name }}
                      </th>
                      <td>
                        {{ $empleados->last_name }}
                      </td>
                      <td>
                        {{ $empleados->extension }}
                      </td>
                      <td><!--nombre de la relacion,nombre de la tabla en donde esta el dato-->
                        {{ $empleados->management->managements }}
                      </td>

                      <td>
                      <form action="{{ url('/workers/'.$empleados->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ url('/workers/'.$empleados->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a> 
                          <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                      </form>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
          </table>
        </div>
      </div>
      <a href="{{ url('/workers') }}" class="btn btn-primary">Crear contacto nuevo</a>
  </div>


@endsection
