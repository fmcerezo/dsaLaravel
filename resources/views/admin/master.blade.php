<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Federación de atletismo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>
@php
    $activeControles = '';
    $activeTemporadas = '';
    $adminButtonClass = 'btn-outline-dark';
@endphp

<body>
    <div class="container">
        <h1>
        @switch(class_basename(Route::current()->controller))
            @case('AdministradorLoginController')
                {{ __('messages.h1_admin_login') }}
                @break
            
            @case('AdministradorHomeController')
                {{ __('messages.h1_admin_home') }}
                @php
                    $adminButtonClass = 'btn-dark';
                @endphp
                @break

            @case('TemporadaController')
                {{ __('messages.h1_temporadas') }}
                @php
                    $activeTemporadas = 'active'
                @endphp
                @break

            @case('ControlController')
            @case('PruebaControlController')
                {{ __('messages.h1_controles') }}
                @php
                    $activeControles = 'active'
                @endphp
                @break

            @case('')
                {{ __('messages.h1_inicio') }}
                @break

            @default
                {{ __('messages.h1_default') }}
                {{ class_basename(Route::current()->controller) }}
        @endswitch
        </h1>

        @if (auth()->guard('admin')->user())
            @include('admin.menu')
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @yield('content')
                    <div class="card-footer text-muted">Desarrollado por Francisco Manuel Cerezo. Perfil en <a href="https://www.linkedin.com/in/fmcerezo" target="_blank">Linkedin</a></div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>