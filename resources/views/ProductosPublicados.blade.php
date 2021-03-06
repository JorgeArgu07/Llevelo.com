@extends('base')

@section('css')
<style type="text/css">
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
            <div class="col-md-7 col-sm-4 mr-3">
                <h3>Productos publicados</h3>
            </div>
            <div class="col-md-2 col-sm-4 ml-5 mr-3">
                <a class="btn btn-danger" href="/ProductosVendidos"><i class="fas fa-box-open mr-2"></i>Productos vendidos</a>
            </div>
            <div class="col-md-2 col-sm-2">
                <a class="btn btn-success" href="/PublicarProducto"><i class="fas fa-plus mr-2"></i>Publicar Producto</a>
            </div>
        </div>
        <hr>
        <!-- <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control" id="InputBuscar" placeholder="Buscar productos">
                </div>
            </div>
        </div> -->
        
        @foreach($productos as $producto)
        <div id="listaProductos">
            <div class="row mt-3">
                <div class="col">
                    <div class="card mt-2" id="Producto">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2 col-sm-2 mt-1">
                                    <img src="{!! $producto->ruta_img !!}" width="80%" class="text-right">
                                </div>
                                <div class="col-md-3 col-sm-4 mt-1">
                                    <h5 class="card-title mt-6">{{$producto->producto}}</h5>
                                    <p class="card-text"><b>Fecha de publicación: </b></p> {{$producto->created_at}}
                                </div>
                                <div class="col-md-3 col-sm-3 mt-2">
                                    <p class="card-text"> <b>Precio: </b> MXN${{$producto->precio}}</p>
                                    @if ($producto->estado == 'activo' )
                                        <p class="card-text"> <b>Estado: </b> <b style="color: #39d393;" id="labelEstado" >Activo</b> </p>  
                                    @else
                                        <p class="card-text"> <b>Estado: </b> <b style="color: #ff4f20" id="labelEstado">Inactivo</b> </p> 
                                    @endif
                                </div>
                                <div class="col-md-3 col-sm-3 mt-2">
                                    <p class="card-text"> <b>Unidades: </b> {{$producto->cantidad}}</p>
                                    
                                </div>
                            
                                <div class="col-md-1 col-sm-5 mt-4">
                                    
                                    <button class="btn dropdown-toggle btn-warning" type="button" id="dropdownOpciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownOpciones">
                                    <!-- <a href="{{url('/updateProducto/'.$producto->id)}}" class="dropdown-item"></a> -->
                                        <form action="/ModificarProducto" method="post">
                                            @csrf
                                            <input type="text" name="id" hidden value="{!! $producto->id !!}">
                                            <button class="dropdown-item" type="submit">Modificar Producto</button>
                                        </form>
                                        <form action="/productos" method="get">
                                            @csrf
                                            <input type="text" name="id" hidden value="{!! $producto->id !!}">
                                            <button class="dropdown-item" type="submit">Ver Producto</button>
                                        </form>
                                        @if ($producto->estado == 'inactivo')
                                        <form action="/setEstadoProducto" method="POST">
                                            @csrf
                                            <input type="text" name="id" hidden value="{!! $producto->id !!}">
                                            <input type="text" name="estado" hidden value="{!! $producto->estado !!}">
                                            <button id="estadoProducto" class="dropdown-item" type="submit">Activar Producto</button>
                                        </form>
                                        @else
                                        <form action="/setEstadoProducto" method="POST">
                                            @csrf
                                            <input type="text" name="id" hidden value="{!! $producto->id !!}">
                                            <input type="text" name="estado" hidden value="{!! $producto->estado !!}">
                                            <button id="estadoProducto" class="dropdown-item" type="submit">Desactivar Producto</button>
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

@endsection

@section('javascript')
    <script>
        $('.dropdown-toggle').dropdown();
        
    </script>
    
    <script type="text/javascript">
        $('#InputBuscar').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{url("/buscarProducto")}}',
                data:{'search':$value},
                success:function(data){
                    $('#listaProductos').html(data);
                }
            });
        })
    </script>
    <!-- <script type="text/javascript">
        $('#estadoProducto').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{url("/setEstadoProducto")}}',
                data:{'search':$value},
                success:function(data){
                    $('#labelEstado').html(data);
                }
            });
        })
    </script> -->
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '@csrf' } });
    </script>
    
    
@endsection