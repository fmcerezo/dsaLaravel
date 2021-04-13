@extends('admin.master')

@section('content')

    <div class="card-header">Federación de atletismo</div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12 py-3 text-center">
                <a href="#" class="btn btn-outline-dark" title="{{ __('messages.pendiente') }}">Acceso de atletas</a>
                <a href="{{ route('login') }}" class="btn btn-outline-dark">Acceso a gestión</a>
            </div>
        </div>
    </div>
@endsection