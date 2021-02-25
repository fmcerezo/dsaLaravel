<!DOCTYPE HTML>
<html lang="es">
<head>
	<title>Inscripciones DSA - Administraci&oacute;n</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    @yield('header1')
    
    @if (auth()->guard('admin')->user())
        @include('admin.menu')
    @endif

    <div class="container">	
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    <div class="card-footer text-muted">
        <hr>
        Desarrollado por Francisco Manuel Cerezo. Contacto en franciscomanuelcerezo@gmail.com
    </div>
</body>
</html>