@extends('admin.master')

@section('header1')
	<h1>Gestión de controles</h1>
@endsection

@section('content')

<div class="card-header">Nuevo control</div>
<div class="card-body">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div><br />
  @endif
    <form method="post" action="{{ route('controles.store') }}">
      @csrf
      <div class="form-group">
        <label for="id_temporada">Temporada:</label>
        <select class="form-control" id="id_temporada" name="id_temporada">
          @foreach ($temporadas as $temporada)
              <option value="{{ $temporada->id_temporada }}">{{ $temporada->ano_inicio_temporada }} / {{ $temporada->ano_fin_temporada }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="fecha_celebracion">Fecha de celebración:</label>
        <input type="date" class="form-control" id="fecha_celebracion" name="fecha_celebracion" value="{{ old('fecha_celebracion') }}" required/>
      </div>
      <div class="form-group">
        <label for="fecha_fin_inscripcion">Fecha límite de inscripción:</label>
        <input type="date" class="form-control" id="fecha_fin_inscripcion" name="fecha_fin_inscripcion" value="{{ old('fecha_fin_inscripcion') }}" required/>
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" required/>
      </div>
      <div class="form-group">
        <label for="activo">Activo:</label>
        <input type="checkbox" class="form-control" id="activo" name="activo" value="{{ old('activo') }}"/>
      </div>
      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection