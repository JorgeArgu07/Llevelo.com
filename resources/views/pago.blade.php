@extends('base')
@extends('templates.master')
@section('content')

@endsection

@section('contenido')

<div class="card" style="width:100%;">
@foreach($prod as $p)
<center>
<input type="hidden" class="id" value="{{$p->id}}" name="ids">  
<button type="button" id="editar" name="editar" class="btn btn-warning  btn-editar producto cantidad precio " style="height:35px" >Añadir al carrito</button> 
<center>
  @endforeach

</div>
@endsection

@section('javascript')
                <script type="text/javascript">
                    $(document).ready(function() {
                        
                             //Carga cantidad
            $('.btn-editar').on("click", function () {
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
                       
            
                    }
                });
                      
                     
                });
            });
                
                        
                    
            
</script>
@stop