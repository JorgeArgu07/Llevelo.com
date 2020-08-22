@extends('base')

@section('css')
{{-- Aqui van los CSS --}}
<style>
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
	}
</style>
@endsection

@section('secion')

@endsection

@section('contenido')
@foreach($pto as $p)
<div class="container"  align="center">
	<div class="card mb-3 justify-content-md-center" style=" width: 850px;  height: 450px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="{{ $p->ruta_img }}" class="card-img" alt="..." width="50">
			</div>
			<div class="col-md-8">
				<div class="card-body" style="text-align: left;">
					
					<h4 class="card-title">{{ $p->producto }}</h4>
					{{-- <h4 class="card-title">Nombre del Producto</h4> --}}
					<h6>Descripcion:</h6>
					<p>{{ $p->detalles }}</p>
					<h6 align="left">Precio: </h6>
					<p>{{ $p->precio }}</p>
					@endforeach
					<div class="container col-12">
						<div class="row">
							<a href="" class="btn rounded-pill btnproduct">Comprar</a>
							<a href="" class="btn rounded-pill btncarrito">Agregar al Carrito</a>
							{{-- Esta es la buena jorge --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection