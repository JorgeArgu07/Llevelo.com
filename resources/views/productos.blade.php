@extends('base')
@section('css')
{{-- Aqui van los CSS --}}
<style>
	.btn{
        border-radius: 20px;
    }
	.btn-success{
        background-color: #39d393;
        border-color: #39d393;   
    }
	.btn-success:hover{
        background-color: #36c98c;
        border-color: #36c98c;
    }
	.btn-warning{
        background-color: #eeb729;
        border-color: #eeb729;
        color: white;
    }
	
</style>
@endsection
@section('secion')
@endsection
@section('contenido')
@foreach($pto as $p)
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card mt-5">
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-md-5 col-sm-6">
								<img src="{{ $p->ruta_img }}" class="card-img" alt="..." width="30%">
							</div>
							<div class="col-md-6 col-sm-6">
								<h3 class="card-title">{{ $p->producto }}</h3>
								<p> <b>Condición: </b> {{ $p->condicion }}</p>
								<p> <b>Descripcion: </b> {{ $p->detalles }}</p>
								<p><b>Precio: </b>MXN${{ $p->precio }}</p>
								<br>
								<a href="" class="btn btn-success mr-3">Comprar</a>
								<a href="" class="btn btn-warning">Agregar al Carrito</a>
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