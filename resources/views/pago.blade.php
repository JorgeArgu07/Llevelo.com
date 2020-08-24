@extends('templates.master')
@section('content')



<div class="container">
<div class="card" style="width:100%;">
<div class="card-body">
<h3 class="card-title">Forma de pago</h3>
</div>
</div>
<div class="card" style="width:100%;">
@foreach($personas as $p)
<center>
<input type=image src="img/Tarjeta.png"   width="160" height="80"> 
<input type="hidden" class="id" value="{{$p->id}}" name="ids"> 
<button style="font-weight: bold; color: white; background-color: #45bc5d;" class="btn btn-primary btn-add"data-toggle="modal" data-target="#modalForm">Agregar Equipo <i class="fas fa-plus-circle" style="color: white;"></i></button>



{{--<a type="button" src="img/paypal.jpg" class="btn btn-primary btn-editar" name="editar" id="editar" data-toggle="modal" data-target="#exampleModal">--}}
Paypal
</a>

<center>
  @endforeach
</div>
  </div>
</div>
<br><br>
</div>
<!-- MODAL AGREGAR-->
<div class="modal fade bd-example-modal-lg" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">Agregar nuevo equipo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                            {{csrf_field()}}
            
                    <button  type="Submit" id="agregar" class="btn btn-primary btn-agregar btn-generico">Guardar</button>
                    <button type="button" class="btn btn-secondary btn-generico-cancelar" data-dismiss="modal ">Cerrar</button>
            </div>

            <!-- Modal Footer -->

        </div>
    </div>
</div>

       
@section('javascript')
                <script type="text/javascript">
                    $(document).ready(function() {
               //Agregar equipo
               $('.btn-agregar').on("click",function () {
               var token = $('input[name=_token]').val();
               var id = $(this).parent().parent().find('.id').val();
               var cantidad = $(this).parent().parent().find('.cantidad').val();
               var total = $(this).parent().parent().find('.precio').val();
               var id_persona = $(this).parent().parent().find('.id_persona').val();
               var load = $('#agregar');
                load.html('Agregando '+' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                console.log(id);
                $.ajax({
                    url: "/agregar",
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        _token: token,
                        id_persona, id_persona,
                        cantidad: cantidad,
                        total: total,
                    },
                    success: function (response) {
                        console.log(response);
                      location.href = '/agregar';
                    },
                    error: function( jqXHR, textStatus, errorThrown ){
                        console.log(jqXHR);
                    }
                });
            });
                             //Carga cantidad
            $('.btn-editar').on("click", function () {
                var token = $('input[name=_token]').val();
                var id = $(this).parent().parent().find('.id').val();
                var cantidad = $(this).parent().parent().find('.cantidad').val();
                var total = $(this).parent().parent().find('.precio').val();
                var id_persona = $(this).parent().parent().find('.id_persona').val();
                console.log(id);
                console.log(id_persona);
              
              
                
                $.ajax({
                    url: "/agregarpago",
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        id: id,
                        id_persona,
                        cantidad: cantidad,
                        total: total,
                        _token: token
                    },
                    success: function (response) {
                        console.log(response);
                        $('#exampleModalEliminar').modal('show');
                        location.href='/agregar';
            
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
                                         $('#exampleModalEliminar').modal('show');
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