@extends('admin.master')

@section('header1')
	<h1>Gestión de temporadas</h1>
@endsection

@section('content')

<div class="card-header">Nueva temporada</div>
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
    <form method="post" action="{{ route('temporadas.store') }}">
        <div class="form-group">
            @csrf
            <label for="ano_inicio_temporada">Año inicio temporada:</label>
            <input type="number" class="form-control" id="ano_inicio_temporada" name="ano_inicio_temporada" required/>
        </div>
        <div class="form-group">
            <label for="ano_fin_temporada">Año fin temporada:</label>
            <input type="number" class="form-control" id="ano_fin_temporada" name="ano_fin_temporada" required/>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection