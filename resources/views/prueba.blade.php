@extends('templates.master')
@section('content')
@csrf  


<div class="container"  align="center">
	<div class="card mb-3 justify-content-md-center" style=" width: 850px;  height: 500px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="..." class="card-img" alt="...">
			</div>
			<div class="col-md-8">
				<div class="card-body" style="text-align: left;">
                @foreach($productos as $p)
					<h5 class="card-title">Card title</h5>
				
					<div class="container col-12">
						<div class="row">
							{{-- boton de comprar ahora. --}}
                            <input type="hidden" class="id" value="{{$p->id}}" name="ids">  </td>
     <td><button  type="button" id="editar" name="editar"  value="{{$p->id}}" value="{{$p->cantidad}}"  class="btn btn-warning float-right btn-editar cantidad id_producto " href="#exampleModalCenter"style="height:35px" >Añadir al carrito</button> 
							<a href="" class="">Agregar a Favoritos</a>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>
</div>

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