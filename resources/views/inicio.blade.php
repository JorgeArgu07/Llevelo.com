@extends('base')

@section('css')
<link rel="stylesheet" type="text/css" href="../css/inicio.css">
@endsection

@section('contenido')
<div id="carouselExampleCaptions" class="carousel slide col-12 carrusel" data-ride="carousel" style="width: 1200px; height: 500px;">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
  		<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
  	</ol>
  	<div class="carousel-inner">
    	<div class="carousel-item active">
      		<img src="/img/ego.jpg" class="d-block w-100 img-fluid rounded carrusel" alt="gel ego" style="">
      {{-- <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div> --}}
    	</div>
    	<div class="carousel-item">
    		<img src="/img/clean.jpg" class="d-block w-100 img-fluid rounded carrusel" alt="clean">
      {{-- <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>--}}
    	</div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    	<span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
    	<span class="sr-only">Next</span>
    </a>
</div>

<div class="container">
	<h4 class="margen col-12">Lo Mas Buscado</h4>
</div>

<div class="container col-12 rounded contenedor bg-light" style=" padding-bottom: 10px; padding-top: 10px; width: 1170px;">
	<div class="col-12 liga">
		<a href="">Ver más</a>
	</div>
	<div class="card-deck row justify-content-md-center">
		<div class="card ">
{{-- Las imagenes deben tener una dimension de 340x340 --}}
			<img src="/img/cubre.webp" class="imagen rounded imagenes">
			{{-- <div class="card-body">
				<h5 class="card-title">Card title</h5>
				<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			</div> --}}
			<div class="card-footer">
				<small class="text-muted">Last updated 3 mins ago</small>
			</div>
		</div>
		<div class="card">
			<img src="/img/xbox360.png" class="imagen rounded img-fluid imagenes">
			
			<div class="card-footer">
				<small class="text-muted">Last updated 3 mins ago</small>
			</div>
		</div>
		<div class="card">
			<img  src="/img/gta.jpg" class="imagen rounded img-fluid imagenes">
			
			<div class="card-footer">
				<small class="text-muted">Last updated 3 mins ago</small>
			</div>
		</div>
		<div class="card">
			<img  src="/img/far.jpg" class="imagen rounded img-fluid imagenes">
			
			<div class="card-footer">
				<small class="text-muted">Last updated 3 mins ago</small>
			</div>
		</div>
		<div class="card">
			<img  src="/img/left.jpg" class="imagen rounded img-fluid imagenes">
			
			<div class="card-footer">
				<small class="text-muted">Last updated 3 mins ago</small>
			</div>
		</div>
	</div>
</div>

{{-- Contenedores separados --}}

<div class="container col-12 rounded contenedor" style=" padding-bottom: 50px; padding-top: 10px; width: 1170px; ">

	<div class="card-deck col-12 justify-content-md-center">
		<div class="container col">
			<h4 class="margen col-12" >Destacados</h4>
			<div class="container row bg-light rounded contenedor">
				<div class="col-12 liga">
					<a href="" >Ver mas</a>
				</div>
				<div class="card col-sm carta" >
					<img src="/img/xbox360.png" class="rounded img-fluid imagenes">
					<div class="card-footer">
						<small class="text-muted">Last</small>
					</div>
				</div>
				<div class="card col-sm carta">
					<img src="/img/xbox360.png" class="rounded img-fluid imagenes">
					<div class="card-footer">
						<small class="text-muted">Last</small>
					</div>
				</div>
				<div class="card col-sm carta">
					<img src="/img/xbox360.png" class="rounded img-fluid imagenes">
					<div class="card-footer">
						<small class="text-muted">Last</small>
					</div>
				</div>
			</div>
		</div>
		{{-- Segundo contenedor --}}
		<div class="container col ">
			<h4 class="margen col-12" >Destacados</h4>
			<div class="container row bg-light rounded contenedor" >
				<div class="col-12 liga">
					<a href="" >Ver mas</a>
				</div>
				<div class="card col-sm carta" >
					<img src="/img/xbox360.png" class="rounded img-fluid imagenes">
					<div class="card-footer">
						<small class="text-muted">Last</small>
					</div>
				</div>
				<div class="card col-sm carta">
					<img src="/img/xbox360.png" class="rounded img-fluid imagenes">
					<div class="card-footer container">
						<small class="text-muted">Last</small>
					</div>
				</div>
				<div class="card col-sm carta">
					<img src="/img/xbox360.png" class="rounded img-fluid imagenes">
					<div class="card-footer">
						<small class="text-muted">Last</small>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

@endsection