@extends('admin.master')

@section('content')

    <div class="card-header">Programación del control:
        <div>{{$control->descripcion}} a celebrar el {{$control->fecha_celebracion_formateada}}.
        @if (!$control->activo)
            <span class="text-danger">No activo.</span>
        @endif    
        </div>
    </div>
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
        <a class="btn btn-outline-primary" href="{{ route('pruebasControl.create', $control->id_control) }}">Agregar prueba</a>
    
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}  
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Prueba</th>
                    <th class="d-none d-lg-table-cell">Categoría</th>
                    <th>Sexo</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pruebasControl as $pruebaControl)
                <tr>
                    <td>{{$pruebaControl->hora}}</td>
                    <td>{{$pruebaControl->prueba->descripcion}}</td>
                    <td class="d-none d-lg-table-cell">{{$pruebaControl->categoria->nombre}}</td>
                    <td>{{$pruebaControl->sexo}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('pruebasControl.edit', $pruebaControl->id_prueba_control) }}">
                            Modificar
                        </a>
                        <form class="d-inline" action="{{ route('pruebasControl.destroy', $pruebaControl->id_prueba_control) }}" method="post">
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