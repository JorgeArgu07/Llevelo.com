<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="/img/log.ico">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
<!--<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<script src="/js/jquery-3.5.1.slim.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap.js"></script>-->
	

	<link rel="stylesheet" type="text/css" href="/css/nav.css">
	<link rel="image" type="image/png" href="/img/fondo.jpg">

	<script src="https://kit.fontawesome.com/d4ba555f74.js" crossorigin="anonymous"></script>

	@yield('css')
	<style>
	#footer {
  		position: absolute;
 		right: 0;
  		bottom: 0;
  		left: 0;
  		padding: 1rem;
  		background-color: #efefef;
  		text-align: center;
	}
	</style>
	<title>Llevelo</title>
</head>
<body >
<div class="col-12 nav-link border-bottom" style="background-color: #f5f5f5 ;">

	<div class="col-12"style="text-align: right; ">
		
	<ul class="navbar-nav mr-auto">

</ul>

<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
	<!-- Authentication Links -->
	@guest
		<li class="nav-item">
			<a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar/Registrate') }}</a>
		</li>
	@else
		<li class="nav-item dropdown">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				{{ Auth::user()->user }} <span class="caret"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					{{ __('Cerrar Sesion') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
	@endguest
</ul>

	</div>
</div> 

	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-1 mb-3" align="center" >
		
		<a style="margin-left: 20px;" href="/" title="" class="nav-link">
			<img src="/img/log.ico" alt="incio" width="90" height="50" >
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto" id="ulu">
				<li class="nav-item dropdown">
					<a style="margin-left: 20px;" class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-list-ul"></i>
						CATEGORIAS
					</a>
					<div class="dropdown-menu " aria-labelledby="navbarDropdown">
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="100"><img src="/img/vestido.png" class="iconos">Ropa de Mujer</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="101"><img src="/img/camiseta.png" class="iconos">Ropa de Hombre</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="102"><img src="/img/telefonia.png" class="iconos">Telefonia</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="103"><img src="/img/pc.png" class="iconos">Informatica</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="104"><img src="/img/altavoz.png" class="iconos">Electronica</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="105"><img src="/img/limpiar.png" class="iconos">Casa y Electrodomesticos</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="106"><img src="/img/nino.png" class="iconos">Juguetes Infantiles</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="107"><img src="/img/deporte.png" class="iconos">Deporte</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="108"><img src="/img/perfume.png" class="iconos">Belleza y Perfumeria</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="109"><img src="/img/llaves.png" class="iconos">Herramientas</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="110"><img src="/img/llanta.png" class="iconos">Automovil</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="111"><img src="/img/lapiz.png" class="iconos">Escolar</button>
						</form>
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="111"><img src="/img/hospital.png" class="iconos">Farmacia</button>
						</form>
					</div>
				</li>
				<li class="nav-item">
					<a style="margin-left: 20px;" class="nav-link" href="#">
						<i class="fas fa-star"></i>
						DESTACADOS
					</a>
				</li>
{{-- 				<li class="nav-item">
					<a class="nav-link" href="#">
					
						FAVORITOS
					</a>
				</li> --}}
				<li class="nav-item">
					<a class="nav-link" href="/ProductosPublicados">
						<i class="fas fa-archive"></i>
						ADMINISTRADOR DE PRODUCTOS
					</a>
				</li>
				@section('modulos')
				@show
			</ul>
		{{-- 	<form class="form-inline my-2 my-lg-0" action="/buscar" method="GET">
				{{csrf_field()}}
				<input class="form-control mr-sm-2 rounded-pill " type="search" placeholder="Buscar" aria-label="Search">
				<button class="ulu btn btn-warning rounded-pill" type="submit">Buscar</button>
			</form>
		
 --}}			<ul class="navbar-nav" id="ulu">
				<li class="nav-link">

					<a class="nav-link" href="/carrito">
						<i class="fas fa-shopping-cart"></i>
						CARRITO
					</a>
				</li>
			</ul>
		</div>
	</nav>
@section('contenido')



@show


<!-- <footer id="footer" class="navbar navbar-light bg-light" style="text-align: center;">
	Copyright &copy; 2012-2013
</footer>  -->
<!-- <footer class="footer mt-auto py-3">
	<div class="container">
		<span class="text-muted">Place sticky footer content here.</span>
	</div>
</footer> -->
</body>
</html>