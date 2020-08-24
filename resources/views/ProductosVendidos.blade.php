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
    .btn-danger{
        background-color: #ff4f20;
        border-color: #ff4f20;
    }
    .btn-danger:hover{
        background-color: #e0461d;
        border-color: #e0461d;
    }
    .input-group-text{
        background-color: #eeb729;
        border-color: #eeb729;
        color: white;
    }
    .btn-warning{
        background-color: #eeb729;
        border-color: #eeb729;
        color: white;
    }
    .dropdown-item:hover{
        background-color: #eeb729;
        color: white;

    }
    .card{
        box-shadow: 3px 3px 5px grey;
    }
    .dropdown-toggle::after { 
        content: none; 
    } 
</style>

@endsection

@section('modulos')
{{-- Aqui van los modulos del cliente y  --}}
@endsection

@section('contenido')
<div class="container">
        <div class="row mt-4">
            <div class="col-md-7 col-sm-6 mr-3">
                <h3>Productos vendidos</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control" id="InputBuscar" placeholder="Buscar productos">
                </div>
            </div>
        </div>
        
        @foreach($productos as $producto)
        <div id="listaProductos">
            <div class="row mt-3">
                <div class="col">
                    <div class="card mt-2" id="Producto">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2 col-sm-2 mt-1">
                                    <img src="{!! $producto->imagen !!}" width="80%" class="text-right">
                                </div>
                                <div class="col-md-3 col-sm-4 mt-1">
                                    <h5 class="card-title mt-6">{{$producto->titulo}}</h5>
                                    <p class="card-text"><b>Fecha de publicación: </b></p> {{$producto->fecha_venta}}
                                </div>
                                <div class="col-md-3 col-sm-3 mt-2">
                                    <p class="card-text"> <b>Monto vendido: </b> MXN${{$producto->monto_venta}}</p>
                                    @if ($producto->estado == 'pendiente' )
                                        <p class="card-text"> <b>Estado: </b> <b style="color: #39d393;" id="labelEstado" >Pendiente</b> </p>  
                                    @else
                                        <p class="card-text"> <b>Estado: </b> <b style="color: #ff4f20" id="labelEstado">Entregado</b> </p> 
                                    @endif
                                </div>
                                <div class="col-md-3 col-sm-3 mt-2">
                                    <p class="card-text"> <b>Unidades vendidas: </b> {{$producto->cantidad}}</p>
                                    
                                </div>
                            
                                <div class="col-md-1 col-sm-5 mt-4">
                                    
                                    <button class="btn dropdown-toggle btn-warning" type="button" id="dropdownOpciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownOpciones">
                                    
                                        
                                        <form action="/productos" method="get">
                                            @csrf
                                            <input type="text" name="id" hidden value="{!! $producto->id_producto !!}">
                                            <button class="dropdown-item" type="submit">Ver producto</button>
                                        </form>
                                        
                                        <form action="" id="formInfoComprador">
                                            <input type="text" name="idComprador" id="idComprador" hidden value="{!! $producto->id_producto !!}">
                                            <button id="infoComprador" class="dropdown-item" data-toggle="modal" data-target="#modalInfoComprador" type="submit">Ver contacto del comprador</button>
                                        </form>
                                        
                                        
                                        @if ($producto->estado == 'pendiente')
                                        <form action="/setEstadoProducto" method="POST">
                                            @csrf
                                            <input type="text" name="id" hidden value="{!! $producto->id_vendido !!}">
                                            <input type="text" name="estado" hidden value="{!! $producto->estado !!}">
                                            <button id="estadoProducto" class="dropdown-item" type="submit">Marcar como entregado</button>
                                        </form>
                                        @else
                                        <form action="/setEstadoProducto" method="POST">
                                            @csrf
                                            <input type="text" name="id" hidden value="{!! $producto->id_vendido !!}">
                                            <input type="text" name="estado" hidden value="{!! $producto->estado !!}">
                                            <button id="estadoProducto" class="dropdown-item" type="submit">Marcar como pendiente</button>
                                        </form>
                                        @endif
                                        
                                        
                                        
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
    </div>
    
<div class="modal fade" id="modalInfoComprador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodyInfo">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
        
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
{{-- Aqui van los javascript --}}
<script>

    $('#infoComprador').click(function(){
       //we will send data and recive data fom our AjaxController

        var id = $('#formInfoComprador').submit(function(){
            return $('#idcomprador');
        })

       $.ajax({
          url:'/getInfoComprador',
          data:{'id': id },
          type:'get',
          success: function (response) {
                $('#bodyInfo').html(response);
          },
          statusCode: {
             404: function() {
                alert('web not found');
             }
          },
          error:function(x,xs,xt){
              //nos dara el error si es que hay alguno
              window.open(JSON.stringify(x));
              //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
          }
       });
});
</script>
@endsection