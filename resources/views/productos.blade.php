@extends('base')

@section('css')
{{-- Aqui van los CSS --}}

<style>
	
</style>
@endsection

@section('contenido')
<div class="container"  align="center">
	<div class="card mb-3 justify-content-md-center" style=" width: 850px;  height: 500px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="..." class="card-img" alt="...">
			</div>
			<div class="col-md-8">
				<div class="card-body" style="text-align: left;">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					<div class="container col-12">
						<div class="row">
							{{-- boton de comprar ahora. --}}
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