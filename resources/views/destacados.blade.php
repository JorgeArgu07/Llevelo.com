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
	.comprar
	{
		background-color: ;
	}
	.btnproduct
	{
		margin-right: 15px;
		background-color: #39d393;
	}
	.btncarrito
	{
		background-color: #eeb729;
		margin-right: 15px;
	}
	.container
	{
		margin-bottom: 50px;
		width:height: 
	}
</style>
@endsection

@section('modulos')
{{-- Aqui van los modulos del cliente y  --}}
@endsection

@section('contenido')
@foreach($visitas as $v)
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<img src="{{ $v->ruta_img }}" class="card-img" alt="..." width="100%">
							</div>
							<div class="col-md-6 col-sm-6">
								<h3 class="card-title">{{ $v->producto }}</h3>
								<p> <b>Condición: </b> {{ $v->condicion }}</p>
								<p><b>Precio: </b>MXN${{ $v->precio }}</p>
								<br>
								<div class="row">
									<div class="col-md-3 col-sm-1">
										<form action="/productos" method="get" accept-charset="utf-8">
											<button class="btn btn-success" name="id" value="{{ $v->id }}" href="/productos">Ver Producto</button>
										</form>
									</div>
									<div class="col-md-2 col-sm-1">
										<a href="" class="btn btn-warning">Agregar al Carrito</a>
									</div>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection

@section('javascrip')
{{-- Aqui van los javascript --}}
@endsection
