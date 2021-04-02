@extends('admin.master')

@section('content')

<div class="card-header">Modificar prueba</div>
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
  <form method="post" action="{{ route('pruebasControl.update', $pruebaControl->id_prueba_control) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="prueba_id_prueba">Prueba:</label>
      <select class="form-control" id="prueba_id_prueba" name="prueba_id_prueba">
        @foreach ($pruebas as $prueba)
            <option value="{{ $prueba->id_prueba }}" @if (old('prueba_id_prueba', $pruebaControl->prueba_id_prueba) == $prueba->id_prueba) selected="" @endif>
              {{ $prueba->descripcion }}
            </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="categoria_id_categoria">Categoría:</label>
        <select class="form-control" id="categoria_id_categoria" name="categoria_id_categoria">
          @foreach ($categorias as $categoria)
              <option value="{{ $categoria->id_categoria }}" @if (old('categoria_id_categoria', $pruebaControl->categoria_id_categoria) == $categoria->id_categoria) selected="" @endif>
                {{ $categoria->nombre }}
              </option>
          @endforeach
        </select>
      </div>
    <div class="form-group">
      <div>Sexo:</div>
      <label for="masculino">Masculino:</label>
      <input type="radio" class="form-control" id="masculino" name="sexo" value="M" @if (old('sexo', $pruebaControl->sexo) == 'M') checked="" @endif/>
      <label for="femenino">Femenino:</label>
      <input type="radio" class="form-control" id="femenino" name="sexo" value="F" @if (old('sexo', $pruebaControl->sexo) == 'F') checked="" @endif/>
    </div>
    <div class="form-group">
      <label for="hora">Hora:</label>
      <input type="time" class="form-control" id="hora" name="hora" value="{{ old('hora', $pruebaControl->hora) }}" required/>
    </div>
    <button type="submit" class="btn btn-primary">Modificar</button>
  </form>
</div>
@endsection