@extends('templates.master')
@section('content')
<!DOCTYPE html>
<html>
<body>
<div class="card" style="width: 18rem;">
<img class="lib-img-show" src="img/nike.png" style="width:150px">
  <div class="card-body">
  @foreach($Venta as $vent)
	<input type="hidden" class="id" value="{{$vent->id}}" name="ids">
                        
						
    <h5 class="card-title" name="nombre">{{$vent->subtotal}}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <button  type="Submit" id="agregar" class="btn btn-primary btn-agregar btn-generico">Guardar</button>
    @endforeach
  </div>
</div>

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            //Agregar producto
            $('.btn-agregar').on("click",function () {
                var token = $('input[name=_token]').val();
                var nombre = $('input[name=nombre]').val();
                var load = $('#agregar');
                load.html('Agregando '+' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                $.ajax({
                    url: "/agregarmarca",
                    type: 'POST',
                    datatype: 'json',
                    data: {
                        _token: token,
                        nombre: nombre,
                    },
                    success: function (response) {
                        console.log(response);
                        location.href = '/prueba';
                    },
                    error: function( jqXHR, textStatus, errorThrown ){
                        console.log(jqXHR);
                    }
                });
            });
			
			});
            
                });
    </script>

</body>
</html>