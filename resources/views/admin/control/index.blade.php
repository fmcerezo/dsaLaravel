@extends('admin.master')

@section('header1')
    <h1>Gestión de controles</h1>
@endsection

@section('content')

    <div class="card-header">Listado de controles</div>
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
        <a class="sinSubrayado block margenSuperiorCorto" href="{{ route('controles.create') }}">Crear control</a>
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
                <td>Temporada</td>
                <td>Descripción</td>
                <td>Fecha de celebración</td>
                <td>Fecha límite de inscripción</td>
                <td>Activo</td>
            </tr>
        </thead>
        <tbody>
            @foreach($controles as $control)
            <tr>
                <td>{{$control->id_control}}</td>
                <td>{{$control->temporada->descripcion}}</td>
                <td>{{$control->descripcion}}</td>
                <td>{{$control->fecha_celebracion}}</td>
                <td>{{$control->fecha_fin_inscripcion}}</td>
                <td>{{$control->activo}}</td>
                <td>
                    <a href="{{ route('controles.edit', $control->id_control) }}">
                        <button class="btn btn-danger" type="submit">Modificar</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('controles.destroy', $control->id_control) }}" method="post">
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