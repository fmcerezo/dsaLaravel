@extends('admin.master')

@section('content')

<div class="card-header">Nueva prueba</div>
<div class="card-body">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div><br>
  @endif
  <form method="post" action="{{ route('pruebasControl.store', $control->id_control) }}">
    @csrf
    <input type="hidden" name="control_id_control" value="{{ $control->id_control }}">
    <div class="form-group">
      <label for="prueba_id_prueba">Prueba:</label>
      <select class="form-control col-6 col-sm-4 col-md-3 col-lg-2" id="prueba_id_prueba" name="prueba_id_prueba">
        @foreach ($pruebas as $prueba)
            <option value="{{ $prueba->id_prueba }}" @if (old('prueba_id_prueba', 0) == $prueba->id_prueba) selected="" @endif>
              {{ $prueba->descripcion }}
            </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="categoria_id_categoria">Categoría:</label>
        <select class="form-control col-4 col-sm-4 col-md-2 col-lg-2" id="categoria_id_categoria" name="categoria_id_categoria">
          @foreach ($categorias as $categoria)
              <option value="{{ $categoria->id_categoria }}" @if (old('categoria_id_categoria', 0) == $categoria->id_categoria) selected="" @endif>
                {{ $categoria->nombre }}
              </option>
          @endforeach
        </select>
      </div>
    <div class="form-group">
      <div>Sexo:</div>
      <div class="form-check">
        <input type="radio" class="form-control-input" id="masculino" name="sexo" value="M" checked="" />
        <label class="form-check-label" for="masculino">Masculino</label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-control-input" id="femenino" name="sexo" value="F" />
        <label class="form-check-label" for="femenino">Femenino</label>
      </div>
    </div>
    <div class="form-group">
      <label for="hora">Hora:</label>
      <input type="time" class="form-control col-4 col-sm-3 col-md-2 col-lg-2" id="hora" name="hora" @if (old('hora')) value="{{ old('hora') }}" @endif required/>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
  </form>
</div>
@endsection