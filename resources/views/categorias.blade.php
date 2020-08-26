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

@section('contenido')
@foreach($cat as $c)
<div class="container">
	<div class="row col-12 mb-3 contenedor">
		<div class="col">
			<h2>{{ $c->categoria }}</h2>
		</div>	
	</div>
	<hr>
</div>
@endforeach

@foreach($productxcat as $p)
<div class="container">
	<div class="row">
		<div class="col-12 mb-4">
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
									@guest
									<div class="col-md-3 col-sm-1">
										<form action="/productos" method="get" accept-charset="utf-8">
											<button class="btn btn-success" name="id" value="{{ $p->id }}">Ver Producto</button>
										</form>
									</div>
									<div class="col-md-2 col-sm-1">
										<input type="hidden" class="id" value="{{$p->id}}" name="ids">  
    									<a id="editar" name="editar" class="btn btn-warning disabled btn-editar producto cantidad total " style="height:35px; color: white" >Añadir al carrito</a> 
									</div>
									<br>
									<br>	
									<b>*Inicia sesión o registrate para poder comprar este producto</b>
									@else
									<div class="col-md-3 col-sm-1">
										<form action="/productos" method="get" accept-charset="utf-8">
											<button class="btn btn-success" name="id" value="{{ $p->id }}">Ver Producto</button>
										</form>
									</div>
									<div class="col-md-2 col-sm-1">
										<input type="hidden" class="id" value="{{$p->id}}" name="ids">  
    									<a id="editar" name="editar" class="btn btn-warning  btn-editar producto cantidad total " style="height:35px; color: white" >Añadir al carrito</a> 
									</div>
									@endguest	
									
								</div>
						</div>
					</div>
				</div>
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