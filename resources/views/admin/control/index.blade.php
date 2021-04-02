@extends('admin.master')

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
        <a href="{{ route('controles.create') }}">Crear control</a>
    
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
                    <td colspan="3">Operaciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($controles as $control)
                <tr>
                    <td>{{$control->id_control}}</td>
                    <td>{{$control->temporada->descripcion}}</td>
                    <td>{{$control->descripcion}}</td>
                    <td>{{$control->fecha_celebracion_formateada}}</td>
                    <td>{{$control->fecha_fin_inscripcion_formateada}}</td>
                    <td>
                        @if ($control->activo)
                            <i class="fa fa-check text-success" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('pruebasControl.index', $control->id_control) }}">
                            Programar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('controles.edit', $control->id_control) }}">
                            Modificar
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
    </div>
@endsection