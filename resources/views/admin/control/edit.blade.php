@extends('admin.master')

@section('content')

<div class="card-header">Modificación de control</div>
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
    <form method="post" action="{{ route('controles.update', $control->id_control) }}">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="temporada_id_temporada">Temporada:</label>
        <select class="form-control col-6 col-md-3 col-lg-2" id="temporada_id_temporada" name="temporada_id_temporada">
          @foreach ($temporadas as $temporada)
            <option value="{{ $temporada->id_temporada }}" @if (old('temporada_id_temporada', $control->temporada_id_temporada) == $temporada->id_temporada) selected="" @endif>
              {{ $temporada->ano_inicio_temporada }} / {{ $temporada->ano_fin_temporada }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="fecha_celebracion">Fecha de celebración:</label>
        <input type="date" class="form-control col-6 col-md-3 col-lg-2" id="fecha_celebracion" name="fecha_celebracion" value="{{ old('fecha_celebracion', $control->fecha_celebracion) }}" required/>
      </div>
      <div class="form-group">
        <label for="fecha_fin_inscripcion">Fecha límite de inscripción:</label>
        <input type="date" class="form-control col-6 col-md-3 col-lg-2" id="fecha_fin_inscripcion" name="fecha_fin_inscripcion" value="{{ old('fecha_fin_inscripcion', $control->fecha_fin_inscripcion) }}" required/>
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $control->descripcion) }}" required/>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="activo" name="activo" @if (old('activo', $control->activo)) checked="" @endif/>
        <label class="form-check-label" for="activo">Activo</label>
      </div>
      <div class="py-3">
        <button type="submit" class="btn btn-primary">Modificar</button>
      </div>
    </form>
</div>
@endsection