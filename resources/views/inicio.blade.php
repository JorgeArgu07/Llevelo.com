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
		<a href="/destacados">Ver más</a>
	</div>
	<div class="card-deck row justify-content-md-center">
		@foreach($destacados as $d)
		<div class="card ">
{{-- Las imagenes deben tener una dimension de 340x340 --}}
			<img src="{{ $d->ruta_img }}" class="imagen rounded imagenes">
		</div>
		@endforeach
	</div>
</div>

{{-- Contenedores separados --}}

<div class="container col-12 rounded contenedor" style=" padding-bottom: 50px; padding-top: 10px; width: 1170px; ">

	<div class="card-deck col-12 justify-content-md-center">
		<div class="container col">
			<h4 class="margen col-12" >Puede que te interese</h4>
			<div class="container row bg-light rounded contenedor">
{{-- 				<div class="col-12 liga">
					<a href="" >Ver mas</a>
				</div> --}}
				@foreach($product as $p)
				<div class="card col-sm carta" >
					<img src="{{ $p->ruta_img }}" class="rounded img-fluid imagenes">
					<hr>
					<form action="/productos" id="id" name="id" method="get" accept-charset="utf-8" align="center">
						<button style="margin-top: -15px; margin-bottom: 5px; width: 70px;"class="btn btnproduct rounded-pill btn-sm btn-lg text-light"  type="submit" value="{{ $p->id }}" name="id">Ver</button>
					</form>
				</div>
				@endforeach
			</div>
		</div>
		{{-- Segundo contenedor --}}
		<div class="container col ">
			<h4 class="margen col-12" >Puede que te interese</h4>
			<div class="container row bg-light rounded contenedor" >
				{{-- <div class="col-12 liga">
					<a href="" >Ver mas</a>
				</div> --}}
				@foreach($produ as $pr)
					<div class="card col-sm carta">
						{{-- <p>{{ $pr->id}}</p> --}}
						<img src="{{ $pr->ruta_img }}" class="rounded img-fluid imagenes">
						<hr>
						<form action="/productos" method="get" accept-charset="utf-8" align="center">
							<input type="hidden" id="id" name="id" value="{{ $pr->id }}" class="form-control">
							<button style="margin-top: -15px; margin-bottom: 5px; width: 70px;" class="btn btnproduct rounded-pill btn-sm btn-lg text-light"  type="submit" name="subject">Ver</button>
						</form>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	
</div>
{{-- <script>
	$(document).ready(function() {
		setTimeout(refrescar, 10000);
	});
	function refrescar()
	{
		location.reload();
		// $()
	}
</script> --}}
{{-- El de arriba es un codigo para recargar la pagina cada 10 seg --}}

@endsection