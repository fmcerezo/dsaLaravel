@extends('admin.master')

@section('header1')
    <h1>Acceso del administrador</h1>
@endsection

@section('content')

<div class="card-header">Acceso de administrador</div>
<div class="card-body">
    @if(session()->has('error'))
        <div class="alert alert-danger">No te has identificado correctamente.</div>
    @endif
    <form id="frmLogin" method="post" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="login" class="col-md-4 col-form-label text-md-right">Login:</label>

            <div class="col-md-6">
                <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="clave" class="col-md-4 col-form-label text-md-right">{{ __('Clave:') }}</label>

            <div class="col-md-6">
                <input id="clave" type="password" class="form-control" name="clave" required autocomplete="current-password">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Enviar') }}
                </button>

                <button type="reset" class="btn btn-outline-primary">
                    {{ __('Limpiar') }}
                </button>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-md-4">
                Ir a la <a href="{{ route('welcome') }}">página de inicio</a>
            </div>
        </div>
    </form>
</div>
@endsection