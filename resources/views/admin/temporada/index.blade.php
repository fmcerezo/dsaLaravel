@extends('admin.master')

@section('content')

    <div class="card-header">Listado de temporadas</div>
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
        <a href="{{ route('temporadas.create') }}">Crear temporada</a>
    
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
                    <td>Operaciones</td>
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
    </div>
@endsection