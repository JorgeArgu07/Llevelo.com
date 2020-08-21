@extends('templates.master')
@section('content')
<div class="col-12 nav-link border-bottom" style="background-color: #f5f5f5 ;">
	<div class="col-12"style="text-align: right; ">
		
	<ul class="navbar-nav mr-auto">

</ul>

<ul class="navbar-nav ml-auto">
	
	@guest
		<li class="nav-item">
			<a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar/Registrate') }}</a>
		</li>
	@else
		<li class="nav-item dropdown">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				{{ Auth::user()->user }} <span class="caret"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					{{ __('Cerrar Sesion') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
	@endguest
</ul>
	</div>
</div> 

	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-1 mb-3" align="center" >
		
		<a href="/" title="" class="nav-link">
			<img src="/img/log.ico" alt="incio" width="90" height="50" >
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto" id="ulu">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="/img/lista.png" alt="categorias" width="20" height="20">
						CATEGORIAS
					</a>
					<div class="dropdown-menu " aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/categorias"><img src="/img/vestido.png" class="iconos">Ropa de Mujer</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/camiseta.png" class="iconos">Ropa de Hombre</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/telefonia.png" class="iconos">Telefonia</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/pc.png" class="iconos">Informatica</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/altavoz.png" class="iconos">Electronica</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/limpiar.png" class="iconos">Casa y Electrodomesticos</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/nino.png" class="iconos">Juguetes Infantiles</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/deporte.png" class="iconos">Deporte</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/perfume.png" class="iconos">Belleza y Perfumeria</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/llaves.png" class="iconos">Herramientas</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/llanta.png" class="iconos">Automovil</a>
						<a class="dropdown-item" href="/categorias"><img src="/img/lapiz.png" class="iconos">Escolar</a>

					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						<img src="/img/estrella.png" alt="" width="20" height="20">
						DESTACADOS
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						<img src="/img/corazon.png" alt="" width="20" height="20">
						FAVORITOS
					</a>
				</li>
				@section('modulos')
				@show
			</ul>
			<form class="form-inline my-2 my-lg-0" action="/buscar" method="GET">
				{{-- {{csrf_field()}} --}}
				<input id="ulu" class="form-control mr-sm-2 rounded-pill " type="search" placeholder="Buscar" aria-label="Search">
				<button id="ulu" class="btn btn-outline-warning rounded-pill" type="submit">Buscar</button>
			</form>
			<ul class="navbar-nav" id="ulu">
				<li class="nav-link">
					<a class="nav-link" href="#">
						<img src="/img/carrito.png" alt="carrito" width="20" height="20">
						CARRITO
					</a>
				</li>
			</ul>
		</div>
	</nav>
@section('contenido')

@show


@yield('javascript')
</head>

    <style type="text/css">
        .results tr[visible='false'],
        .no-result {
            display: none;
        }
        .results tr[visible='true'] {
            display: table-row;
        }
        .counter {
            padding: 8px;
            color: #ccc;
        }
    </style>
   
      @csrf    
<div class="container">    

<div class="card" style="width:1100px;">
<div class="card-body">
<h3 class="card-title">Carrito</h3>           
@if(($personas && $pagos))
<div class="card" style="width: 100%;" id="tabla1">
        <table class="table" >
 
  <tbody>
    @foreach($personas as $producto)
    <tr>
    <input type="hidden" class="id" value="{{$producto->id}}" name="ids">
    <th><button type="button" class="btn btn-primary btn-eliminar" id="eliminar" data-toggle="modal" data-target="#exampleModalLong" style=" background-color: red; border: 0px;"><i class="far fa-trash-alt" style="color: white;"></i></th>
      <th> <img class="lib-img-show" src="img/nike.png" style="width:150px"> </th>
      <th scope="col" style="width:1000px">Lorem ipsum dolor Lorem 
      ipsum dolor Lorem ipsum dolor 
      Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
      Lorem ipsum dolor Lorem 
      ipsum dolor Lorem ipsum dolor <br>
      <h4> ${{$producto->total}} MXN</h4> </div>
       </th>
     
      
      <td style="width:800px"> <input style="height:35px" type="number" value="{{$producto->cantidad}}" class="float-right cantidad" min="1" max="10" name="cantidad" >   </td>
     <td><button  type="button" id="editar" class="btn btn-warning float-right btn-editar cantidad" href="#exampleModalCenter"style="height:35px" ><i class="fas fa-redo" style="color: white; "></i></i></button>           </td>
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
            
            @section('javascript')
                <script type="text/javascript">
                    $(document).ready(function() {
                        
                             //Carga cantidad
            $('.btn-editar').on("click", function () {
                var token = $('input[name=_token]').val();
                var id = $(this).parent().parent().find('.id').val();
                var cantidad = $(this).parent().parent().find('.cantidad').val();
                console.log(id);
                console.log(cantidad)
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
                                console.log(cantidad + id);
                                load.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
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
                                        console.log(cantidad);
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