@extends('base')

@section('css')
{{-- Aqui van los CSS --}}
@endsection

@section('modulos')
{{-- Aqui van los modulos del cliente y  --}}
@endsection

@section('contenido')
@foreach()
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<img src="{{ $p->ruta_img }}" class="card-img" alt="..." width="100%">
							</div>
							<div class="col-md-6 col-sm-6">
								<h3 class="card-title">{{ $p->producto }}</h3>
								<p> <b>Condición: </b> {{ $p->condicion }}</p>
								<p><b>Precio: </b>MXN${{ $p->precio }}</p>
								<br>
								<div class="row">
									<div class="col-md-3 col-sm-1">
										<form action="/productos" method="get" accept-charset="utf-8">
											<button class="btn btn-success" name="id" value="{{ $p->id }}" href="/productos">Ver Producto</button>
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
