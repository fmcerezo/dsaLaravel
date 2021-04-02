<header class="d-flex col-md-12 py-3">
    <ul class="col-md-8 nav nav-pills">
      	<li class="nav-item"><a href="#" class="nav-link ">Atletas</a></li>
      	<li class="nav-item"><a href="{{ route('controles.index') }}" class="nav-link {{ $activeControles }}">Controles</a></li>
      	<li class="nav-item"><a href="{{ route('temporadas.index') }}" class="nav-link {{ $activeTemporadas }}">Temporadas</a></li>
	</ul>
	<div class="col-md-4 text-right">
		<a href="{{ route('home') }}" class="btn {{ $adminButtonClass }}">Administrador</a>
		<a href="{{ route('logout') }}" class="btn btn-outline-dark">Desconectar</a>
	</div>
</header>