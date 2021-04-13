@extends('admin.master')

@section('content')

    <div class="card-header">Listado de controles</div>
    <div class="card-body">
        <div class="ajax-alert alert alert-danger d-none">
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div><br />
        @endif
        <a class="btn btn-outline-primary" href="{{ route('controles.create') }}">Crear control</a>
    
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}  
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-lg-2 align-top">Temporada
                        <select class="form-control" id="temporada_id_temporada" name="temporada_id_temporada">
                            <option value="0" @if ($idTemporada == 0) selected="" @endif>Todas</option>
                            @foreach ($temporadas as $temporada)
                                <option value="{{ $temporada->id_temporada }}" @if ($idTemporada == $temporada->id_temporada) selected="" @endif>
                                  {{ $temporada->descripcion }}
                                </option>
                            @endforeach
                          </select>
                    </th>
                    <th class="col-lg-2 align-top">Descripción</th>
                    <th class="col-lg-1 align-top d-none d-lg-table-cell">Fecha de celebración</th>
                    <th class="col-lg-1 align-top d-none d-lg-table-cell">Límite de inscripción</th>
                    <th class="col-lg-1 align-top d-none d-lg-table-cell">Activo</th>
                    <th class="col-lg-5 align-top">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($controles as $control)
                <tr>
                    <td>{{$control->temporada->descripcion}}</td>
                    <td>{{$control->descripcion}}</td>
                    <td class="d-none d-lg-table-cell">{{$control->fecha_celebracion_formateada}}</td>
                    <td class="d-none d-lg-table-cell">{{$control->fecha_fin_inscripcion_formateada}}</td>
                    <td class="d-none d-lg-table-cell">
                        @if ($control->activo)
                            <i class="btn fa fa-check text-success" data-old_class="fa-check text-success" data-new_class="fa-times text-danger" data-id_control="{{$control->id_control}}" aria-hidden="true"></i>
                        @else
                            <i class="btn fa fa-times text-danger" data-old_class="fa-times text-danger" data-new_class="fa-check text-success" data-id_control="{{$control->id_control}}" aria-hidden="true"></i>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('pruebasControl.index', $control->id_control) }}">
                            Programar
                        </a>
                        <a class="btn btn-primary" href="{{ route('controles.edit', $control->id_control) }}">
                            Modificar
                        </a>
                        <form class="d-inline" action="{{ route('controles.destroy', $control->id_control) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $controles->links() !!}
    </div>

    <script>
        $(document).ready(function() {
            $("#temporada_id_temporada").change(function() {
                location.href ="{{ route('controles.index') }}/" + $(this).val();
            });

            $(".fa-check, .fa-times").click(function(e) {
                e.preventDefault();

                $("body").css("cursor", "wait");
                $(".ajax-alert").removeClass("d-block");
                $(".ajax-alert").addClass("d-none");
                $(".ajax-alert").text("");
                var crsf = $("input[name='_token']").val();
                var invoker = $(this);
                var id_control = invoker.data("id_control");

                $.ajax({
                    url: "{{ route('controles.ajaxToggleActivo') }}",
                    type:"POST",
                    data: {_token:crsf, id_control:id_control},
                    success: function(data) {
                        if (data == 1) {
                            let oldClass = invoker.data("old_class");
                            let newClass = invoker.data("new_class");
                            invoker.removeClass(oldClass);
                            invoker.addClass(newClass);
                            invoker.data("old_class", newClass);
                            invoker.data("new_class", oldClass);
                        }
                        else
                            $(".ajax-alert").addClass("d-block").removeClass("d-none").append("<strong>No se ha podido modificar el estado.</strong>");
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        if (XMLHttpRequest.status == 401 || XMLHttpRequest.status == 403 || XMLHttpRequest.status == 419)
                            location.href = '{{ route('logout') }}';
                        else
                            $(".ajax-alert").addClass("d-block").removeClass("d-none").append("<strong>" + XMLHttpRequest.statusText + "</strong>");
                    },
                    complete: function() {
                        $("body").css("cursor", "default");
                    }
                });
            });
        });
    </script>

@endsection