@extends('admin.master')

@section('header1')
    <h1>Gestión de temporadas</h1>
@endsection

@section('content')

    <div class="card-header">Listado de temporadas</div>
    <div class="card-body">
        <a class="sinSubrayado block margenSuperiorCorto" href="{{ route('temporadas.create') }}">Crear temporada</a>
    </div>
</div>

<div>
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Año inicio</td>
                <td>Año fin</td>
                <td>Operaci&oacute;n</td>
            </tr>
        </thead>
        <tbody>
            @foreach($temporadas as $temporada)
            <tr>
                <td>{{$temporada->id_temporada}}</td>
                <td>{{$temporada->ano_inicio_temporada}}</td>
                <td>{{$temporada->ano_fin_temporada}}</td>
                <td>
                    <form action="{{ route('temporadas.destroy', $temporada->id_temporada)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection