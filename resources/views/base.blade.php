<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="/img/log.ico">
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery-3.5.1.slim.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/nav.css">
	<link rel="image" type="image/png" href="/img/fondo.jpg">
	@yield('css')
	<title>Llevelo</title>
</head>
<body >
<div class="col-12 nav-link border-bottom" style="background-color: #f5f5f5 ;">
	<div class="col-12"style="text-align: right;">
		<a href="/" class="text-muted btn">
			<img src="/img/user.png" alt="" width="20" height="20">
			Iniciar/Registrarse
		</a>
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
						<img src="/img/lista.png" alt="categorias" width="20" height="20">
						CATEGORIAS
					</a>
					<div class="dropdown-menu " aria-labelledby="navbarDropdown">
						<form action="/categorias" method="get" accept-charset="utf-8">
							<button class="dropdown-item" type="submit" name="subject" value="1"><img src="/img/camiseta.png" class="iconos">Ropa</button>
							<button class="dropdown-item" type="submit" name="subject" value="2"><img src="/img/telefonia.png" class="iconos">Telefonia</button>
							<button class="dropdown-item" type="submit" name="subject" value="3"><img src="/img/pc.png" class="iconos">Informatica</button>
							<button class="dropdown-item" type="submit" name="subject" value="4"><img src="/img/altavoz.png" class="iconos">Electronica</button>
							<button class="dropdown-item" type="submit" name="subject" value="5"><img src="/img/limpiar.png" class="iconos">Casa y Electrodomesticos</button>
							<button class="dropdown-item" type="submit" name="subject" value="6"><img src="/img/nino.png" class="iconos">Juguetes Infantiles</button>
							<button class="dropdown-item" type="submit" name="subject" value="7"><img src="/img/deporte.png" class="iconos">Deporte</button>
							<button class="dropdown-item" type="submit" name="subject" value="8"><img src="/img/perfume.png" class="iconos">Belleza y Perfumeria</button>
							<button class="dropdown-item" type="submit" name="subject" value="9"><img src="/img/llaves.png" class="iconos">Herramientas</button>
							<button class="dropdown-item" type="submit" name="subject" value="10"><img src="/img/llanta.png" class="iconos">Automovil</button>
							<button class="dropdown-item" type="submit" name="subject" value="11"><img src="/img/lapiz.png" class="iconos">Escolar</button>
							<button class="dropdown-item" type="submit" name="subject" value="12"><img src="/img/hospital.png" class="iconos">Farmacia</button>
						</form>
					</div>
				</li>
				<li class="nav-item">
					<a style="margin-left: 20px;" class="nav-link" href="/destacados">
						<img src="/img/estrella.png" alt="" width="20" height="20">
						DESTACADOS
					</a>
				</li>
{{-- 				<li class="nav-item">
					<a class="nav-link" href="#">
						<img src="/img/corazon.png" alt="" width="20" height="20">
						FAVORITOS
					</a>
				</li> --}}
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
					<a class="nav-link" href="#">
						<img src="/img/carrito.png" alt="carrito" width="20" height="20">
						CARRITO
					</a>
				</li>
			</ul>
		</div>
	</nav>
@section('contenido')

@show

{{-- <footer class="navbar navbar-light bg-light" style="text-align: center;">
	Copyright &copy; 2012-2013
</footer> --}}
{{-- <footer class="footer mt-auto py-3">
	<div class="container">
		<span class="text-muted">Place sticky footer content here.</span>
	</div>
</footer> --}}
</body>
</html>