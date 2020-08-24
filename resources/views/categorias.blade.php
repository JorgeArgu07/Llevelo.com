@extends('base')
@extends('templates.master')

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

@section('contenido')
@foreach($cat as $c)
<div class="container rounded " align="center">
	<div class="container col-12 card mb-3 justify-content-md-center contenedor" style="text-align: left;">
		<h4>Categoria de {{ $c->categoria }}</h4>
	</div>
</div>
@endforeach
@foreach($productxcat as $pxc)
<div class="container "  align="center" style="margin-top: -20px; ">
	<div class="card mb-3 justify-content-md-center contenedor col-12">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="{{ $pxc->ruta_img }}" class="card-img" alt="Producto" width="50">
			</div>
			<div class="col-md-8">
				<div class="card-body descripcion">
					<h4 class="card-title">{{ $pxc->producto }}</h4>
					<h6>Descripcion:</h6>
					<p>Aqui va ala descripcion del product</p>
					<h6 align="left">Precio: </h6>
					<p class="card-text">{{ $pxc->precio }}</p>
					<h6 align="left">Cantidad: </h6>
					<p class="card-text">{{ $pxc->cantidad }}</p>
					<div class="container col-12">
						<div class="row">
							{{-- <a class="btn btnproduct rounded-pill " href="/traer" >Ver Producto</a> --}}
							<form action="/producto" method="get" accept-charset="utf-8">
								<button class="btn btnproduct rounded-pill text-light" name="subject" value="{{ $pxc->id }}" href="/producto">Ver Producto</button>
							</form>
							<div class="col-md-2 col-sm-1">
							<input type="hidden" class="id" value="{{$pxc->id}}" name="ids">  
    						<a id="editar" name="editar" class="btn btn-warning  btn-editar producto cantidad precio " style="height:35px" >Añadir al carrito</a> 
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

@section('javascript')
                <script type="text/javascript">
                    $(document).ready(function() {
                        
                             //cargar productos
            $('.btn-editar').on("click", function () {
                var token = $('input[name=_token]').val();
                var id = $(this).parent().parent().find('.id').val();
            
                $.ajax({
                    url: "/agregarproductos",
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function (response) {
                        console.log(response);
                       
            
                    }
                });
            
            });
                        
                });
                
                        
                    
                       
                        
                </script>
                
            @stop