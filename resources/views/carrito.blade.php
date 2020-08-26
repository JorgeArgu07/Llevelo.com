@extends('base')
@extends('templates.master')
@section('content')

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
      @csrf    
<div class="container">    

<div class="card" style="width:1100px;">
<div class="card-body">
<h3 class="card-title">Carrito</h3>    
     
   
@if(($personas))
<div class="card" style="width: 100%;" id="tabla1">
        <table class="table" >
 
  <tbody>
    @foreach($personas as $producto)
    <tr>
    <input type="hidden" class="id" value="{{$producto->id}}" name="ids"> 
    <th><button type="button" class="btn btn-primary btn-eliminar" id="eliminar" data-toggle="modal" data-target="#exampleModalLong" style=" background-color: red; border: 0px;"><i class="far fa-trash-alt" style="color: white;"></i></th>
    <th> <img class="lib-img-show" src="{{$producto->ruta_img}}" value="{{$producto->ruta_img}}" style="width:150px"> </th>
    <th scope="col"><h5>{{$producto->producto}}</h5>
      <th scope="col" style="width:1000px"><p>{{$producto->detalles}}</p> <br>
     <h4> ${{$producto->precio}} MXN</h4> </div>
       </th>
     
     
     <td style="width:800px"> <input style="height:35px" type="number" value="{{$producto->cantidad}}" class="float-right cantidad" min="1" max="10" name="productos" >   </td>
     <td><button  type="button" id="editar" name="editar" value="" class="btn btn-warning float-right btn-editar cantidad" href="#exampleModalCenter"style="height:35px" ><i class="fas fa-redo" style="color: white; "></i></i></button>           </td>
     <td style="width:800px">
</td>
    </div>

    
    </tr>
    @endforeach
  </tbody>
</table>
<h3 class="col-md-6">Cantidad total <br>
@foreach ($ventas as $venta)
						<h5 class="col-md-6">${{$venta->ventas}}MXN</h5>
@endforeach

    </div>
    <center>
    <button type="button"  id="eliminar"  class="btn btn-primary eliminar" style=" background-color: red; border: 0px;">Vaciar</button>
<center>
<br>

</div>

</div>

       
<form method="POST" action="carrito">
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ¿Esta seguro que quiere eliminar el producto?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="eliminado" class="btn btn-primary btn-eliminado btn-generico">Confirmar</button>
                  
                  </div>
                </div>
              </div>
            </div>


         
    
            @else
                        <h5>No hay productos </h5>
            @endif
            @endsection
            @section('javascript')
                <script type="text/javascript">
                    $(document).ready(function() {
                                      
                             //Carga cantidad
            $('.btn-pagar').on("click", function () {
                var token = $('input[name=_token]').val();
                var id = $(this).parent().parent().find('.id').val();
            
                $.ajax({
                    url: "/agregarpago",
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function (response) {
                        console.log(response);
                        location.href='/';
                       
            
                    }
                });
                      
                     
                });
                        
                             //Carga cantidad
            $('.btn-editar').on("click", function () {
                var token = $('input[name=_token]').val();
                var id = $(this).parent().parent().find('.id').val();
                var cantidad = $(this).parent().parent().find('.cantidad').val();
              
                console.log(id);
              
                
                $.ajax({
                    url: "/actualizarcantidad",
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        id: id,
                        cantidad: cantidad,
                        _token: token
                    },
                    success: function (response) {
                        console.log(response);
                        location.href='/carrito';
            
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
                               
                                var load = $('#guardar');
                                console.log(cantidad+ id);
                                load.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                                
                                 console.log(productos);
                                $.ajax({
                                    url: "/actualizarcantidad",
                                    type: 'POST',
                                    datatype: 'json',
                                    data: {
                                        id: id,
                    
                                        _token: token
                                    },
                                    success: function (response) {
                                      
                                        location.href='/carrito';
                            
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
                                    url: "/eliminarcarrito",
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