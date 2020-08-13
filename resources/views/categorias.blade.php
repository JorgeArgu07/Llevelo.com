@extends('base')

@section('css')
<style>

	.contenedor
	{
		width: 850px;
	}

	.descripcion
	{
		text-align: left;
	}
	a
	{
		margin-right: 10px;
	}
</style>
@endsection

@section('contenido')
<div class="container"  align="center">
	<div class="card mb-3 justify-content-md-center contenedor">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="..." class="card-img" alt="...">
			</div>
			<div class="col-md-8">
				<div class="card-body descripcion">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					<div class="container col-12">
						<div class="row">
							<a class="btn btn-outline-primary btn-sm" href="/producto" role="button">Ver Producto</a>
							<a href="" class="btn btn-outline-warning btn-sm">Agregar al Carrito</a>
							<a href="" class="">Agregar a Favoritos</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection