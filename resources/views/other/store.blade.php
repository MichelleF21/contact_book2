@extends('up_down.header')

@section('content')

	<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo contacto</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('/') }}" class="btn btn-sm btn-success"><i class="fas fa-chevron-left"></i>Regresar</a>
                </div>
              </div>
            </div>

            <div class="card-body">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" rol="alert">
                        <i class= fas fa-exclamation-triangle></i>
                        <strong>Error</strong> {{ $error }}
                    </div>
                @endforeach    
            @endif

                <form action="{{ url('/workers/create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre del contacto</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="extension">Extensión</label>
                        <input type="text" name="extension" class="form-control" value="{{ old('extension') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="management_id">Gerencia</label>
                          <select name="management_id" class="form-control" required>
                              <option value="" disabled {{ old('management_id') ? '' : 'selected' }}>Selecciona una gerencia</option>
                            @foreach ($management as $gerencia)
                                <option value="{{ $gerencia->id }}" {{ old('management_id') == $gerencia->id ? 'selected' : '' }}>
                                    {{ $gerencia->managements }}
                                </option>
                            @endforeach
                          </select>
                      </div>

                    <br>
                    <button type="submit" class="btn btn-sm btn-primary">Crear contacto</button>
                    

                </form>
            </div>
          </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
@endsection