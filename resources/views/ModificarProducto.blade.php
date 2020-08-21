@extends('base')

@section('css')
<style type="text/css">
        .card{
            box-shadow: 3px 3px 5px grey;
        }
        .form-control{
            border-radius: 20px;
        }
        .btn-success{
            background-color: #39d393;
            border-color: #39d393;
            border-radius: 20px;
            
        }
        .btn-success:hover{
            background-color: #36c98c;
            border-color: #36c98c;
        }
        
    </style>
@endsection

@section('modulos')
{{-- Aqui van los modulos del cliente y  --}}
@endsection

@section('contenido')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h3>Modificar Producto</h3>            
            <p>Modifica el formulario con la información de tu producto que deseas cambiar.</p>       
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <form method="POST" action="/updateProducto" enctype="multipart/form-data">
                @csrf
                <div class="form-group card">
                    <div class="card-body">
                    <label for="InputTitulo">Título del producto</label>
                    <input type="text" value="{!! $producto[0]->producto !!}" class="form-control" id="InputTitulo" name="producto" placeholder="Ingresa un titulo para tu producto" maxlength="50" required>
                    <small id="TituloNota" class="form-text text-muted">Recuerda ingresar un buen titulo para tu producto, así los clientes estarán mas intersados en él.</small>
                    </div>               
                </div>
                
                <div class="form-group card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-3">
                                <label for="InputCantidad">Cantidad</label>
                                <input value="{!! $producto[0]->cantidad !!}" type="number" class="form-control" name="cantidad" id="InputCantidad" placeholder="Unidades" required>
                            </div>
                        </div>
                        <small id="CantidadNota" class="form-text text-muted">Unidades en existencia de tu producto.</small>               
                    </div>               
                </div>
                <div class="form-group card">
                    <div class="card-body">
                    <label for="InputPrecio">Precio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">MXN$</span>
                            </div>
                            <input value="{!! $producto[0]->precio !!}" name="precio" type="number" min=1 step="any" class="form-control" id="InputPrecio" placeholder="0" aria-describedby="inputGroupPrepend" required>
                        </div>
                        <small id="PrecioNota" class="form-text text-muted">Asigna un precio para tu producto.</small>
                    </div>               
                </div>
                
                <div class="form-group card">
                    <div class="card-body">
                        <label for="TextAreaDetalles">Detalles</label>
                        <textarea  class="form-control" id="TextAreaDetalles" name="detalles" rows="5" maxlength="350">{{$producto[0]->detalles}}</textarea>
                        <small id="DetallesNota" class="form-text text-muted">Agrega detalles extra que consideres relevantes de tu producto.</small>
                        <small id="DetallesNota" class="form-text text-muted"><i class="fas fa-info-circle" style="color: royalblue;"></i> Recuerda cuidar tu redacción y ortografía para que los detalles sean entendibles.</small>
                    </div>
                    <div class="card-footer">
                        <input type="text" name="id" hidden value="{!! $producto[0]->id !!}">
                        <label for="btnModificar" class="mt-1"><i class="fas fa-info-circle" style="color:royalblue;"></i> No olvides revisar la información de tu producto antes de publicarlo.</label>
                        <button type="submit" class="btn btn-success float-right" id="btnModificar">Guardar cambios</button>
                    </div>
                </div>
                
                
                
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
{{-- Aqui van los javascript --}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imgPreview').attr('src', e.target.result);
                $('#imgPreview').removeAttr('hidden');
            }
            reader.readAsDataURL(input.files[0]);

        }
    }
    
    $("#InputImagen").change(function(){
        readURL(this);
    });
</script>
@endsection