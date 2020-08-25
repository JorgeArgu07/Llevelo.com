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


@section('javascript')
                <script type="text/javascript">
                    $(document).ready(function() {
                        
                             //Carga cantidad
            $('.btn-editar').on("click", function () {
                var token = $('input[name=_token]').val();
                var id = $(this).parent().parent().find('.id').val();
                var cantidad = $(this).parent().parent().find('.cantidad').val();
                var total = $(this).parent().parent().find('.precio').val();
                var id_producto = $(this).parent().parent().find('.id_producto').val();
                console.log(id);
                console.log(cantidad);
                console.log(total);
                console.log(id_producto);
                $.ajax({
                    url: "/agregarproductos",
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        id: id,
                        id_producto: id_producto,
                        cantidad: cantidad,
                        total: total,
                        _token: token
                    },
                    success: function (response) {
                        console.log(response);
                        location.href='/productos';
            
                    }
                });
                /*$.ajax({
                    url: "/editar",
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function (response) {
                        console.log(response);
                        $('#exampleModalCenter').modal('show');
                       
                    }
                });*/
            });
                         //Guarda cantidad editada
                         $("#guardar").click(function () {
                                var token = $("input[name='_token']").val();
                                var id = $(this).parent().parent().find('.id').val();
                                var cantidad = $('.cantidad').val();
                                var total = $('.total').val();
                                var id_producto = $('.id_producto').val();
                                var load = $('#guardar');
                              
                                load.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                                
                                 console.log(productos);
                                $.ajax({
                                    url: "/cargarproductos",
                                    type: 'POST',
                                    datatype: 'json',
                                    data: {
                                        id: id,

                    
                                        _token: token
                                    },
                                    success: function (response) {
                                      
                                        location.href='/pago';
                            
                                    }
                                });
                            });
                      
                        //Vaciar carrito
                        $('.eliminar').click(function () {
                                var load = $('#eliminar');
                                var token = $('input[name=_token]').val();
                                   var id = $(this).parent().parent().find('.id').val();
                                   
                                console.log(id);
                                console.log(id);
                                $.ajax({
                                    url: "/agregarpago",
                                    type: 'POST',
                                    datatype: 'json',
                                    data: {
                                        id: id,
                                        _token: token
                                    },
                                    success: function (response) {
                                        location.href = '/pago';
                                    }
                                });
                            });
                        //Eliminar producto
                       $('.btn-eliminar').on("click",function () {
                            var token = $('input[name=_token]').val();
                            var id = $(this).parent().parent().find('.id').val();
                            console.log(id);
                            $.ajax({
                                url: "/productoaeliminar",
                                type: 'POST',
                                datatype: 'json',
                                data: {
                                    id: id,
                                    _token: token
                                },
                                success: function (response) {
                                    var producto = $('#aeliminar');
                                    console.log(response);
                                    producto.html('');
                                    $('#exampleModalEliminar').modal('show');
                                    producto.append('¿Desea eliminar '+'<strong style="color: #1d68a7; font-weight: bold">'+response[0].nombre+'</strong>' + '?');
                                    console.log(response);
                                }
                            });
                            $('.btn-eliminado').click(function () {
                                var load = $('#eliminado');
                                load.html('Eliminando '+' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                               
                                $.ajax({
                                    url: "/eliminarproducto",
                                    type: 'POST',
                                    datatype: 'json',
                                    data: {
                                        id: id,
                                        _token: token
                                    },
                                    success: function (response) {
                                        location.href = '/carrito';
                                    }
                                });
                            });
                        });
                });
                
                        
                    
                       
                        
                </script>
                
            @stop
