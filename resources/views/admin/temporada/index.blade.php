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
        <a class="btn btn-outline-primary" href="{{ route('temporadas.create') }}">Crear temporada</a>
    
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}  
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Temporada</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($temporadas as $temporada)
                <tr>
                    <td>{{$temporada->descripcion}}</td>
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