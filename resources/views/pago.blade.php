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


<button value="{{$p->id}}" type="button" id="editar" name="editar" class="btn btn-warning  btn-editar cantidad id_producto precio " style="height:35px" >Añadir al carrito</button> 


<center>
  @endforeach
</div>
  </div>
</div>
<br><br>
</div>


@section('javascript')
                <script type="text/javascript">
                    $(document).ready(function() {
                        
                             //Carga cantidad
            $('.btn-editar').on("click", function () {
                var token = $('input[name=_token]').val();
                var id = $(this).parent().parent().find('.id').val();
              
                console.log(id);
                console.log(cantidad);
                console.log(total);
                console.log(id_producto);
                $.ajax({
                    url: "/agregarpago",
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
                        location.href='';
            
                    }
             
                      
                     
                });
                
                        
                    
                       
                        
                </script>
                
            @stop