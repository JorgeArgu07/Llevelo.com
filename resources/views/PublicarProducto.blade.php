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
        <div class="col-12 mr-3">
                      
            <h3>Publicar producto</h3>                           
            <h5>Rellena el formulario con la información de tu producto.</h5>        
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <form method="POST" action="/setProducto" enctype="multipart/form-data">
                @csrf
                <div class="form-group card">
                    <div class="card-body">
                    <label for="InputTitulo">Título del producto</label>
                    <input type="text" class="form-control" id="InputTitulo" name="InputTitulo" placeholder="Ingresa un titulo para tu producto" maxlength="50" required>
                    <small id="TituloNota" class="form-text text-muted">Recuerda ingresar un buen titulo para tu producto, así los clientes estarán mas intersados en él.</small>
                    </div>               
                </div>
                <div class="form-group card">
                    <div class="card-body">
                        <label for="SelectCategoria">Categoria</label>
                        <select class="form-control form-control-md" id="SelectCategoria" name="SelectCategoria">
                            @foreach( $categorias as $valor => $categoria)
                                <option value='{!! $valor !!}'>{{ $categoria }}</option>
                            @endforeach
                        </select>
                        <small id="SelectCategoria" class="form-text text-muted">Selecciona la categoría mas adecuada para tu producto</small>
                    </div>
                </div>
                <div class="form-group card">
                    <div class="card-body">
                        <label for="RadiosCondicion">Selecciona la condición de tu producto:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="RadiosCondicion" id="RadioNuevo" value="Usado" required>
                            <label class="form-check-label" for="RadioNuevo">
                                Nuevo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="RadiosCondicion" id="RadioUsado" value="Nuevo" required>
                            <label class="form-check-label" for="RadioUsado">
                                Usado
                            </label>
                        </div>
                    </div>             
                </div>
                <div class="form-group card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-3">
                                <label for="InputCantidad">Cantidad</label>
                                <input type="number" min="1" class="form-control" name="InputCantidad" id="InputCantidad" placeholder="Unidades" required>
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
                            <input name="InputPrecio" type="number" min=1 step="any" class="form-control" id="InputPrecio" placeholder="0" aria-describedby="inputGroupPrepend" required>
                        </div>
                        <small id="PrecioNota" class="form-text text-muted">Asigna un precio para tu producto.</small>
                    </div>               
                </div>
                <div class="form-group card">
                    <div class="card-body"> 
                        <label for="InputImagen">Foto/Imagen</label>
                        <input type="file" class="form-control-file" id="InputImagen" name="InputImagen" accept="image/x-png,image/jpeg" required>
                        <img src="#" alt="img" id="imgPreview" class="hide" style="width: 30%;" hidden>
                        <small id="ImagenNota" class="form-text text-muted">Recuerda agregar una imagen o fotografía que represente bien a tu producto.</small>
                        
                    </div>
                </div>
                <div class="form-group card">
                    <div class="card-body">
                        <label for="TextAreaDetalles">Detalles</label>
                        <textarea class="form-control" id="TextAreaDetalles" name="TextAreaDetalles" rows="5" maxlength="350"></textarea>
                        <small id="DetallesNota" class="form-text text-muted">Agrega detalles extra que consideres relevantes de tu producto.</small>
                        <small id="DetallesNota" class="form-text text-muted"><i class="fas fa-info-circle" style="color: royalblue;"></i> Recuerda cuidar tu redacción y ortografía para que los detalles sean entendibles.</small>
                    </div>
                    <div class="card-footer">
                        <label for="btnPublicar" class="mt-1"><i class="fas fa-info-circle" style="color:royalblue;"></i> No olvides revisar la información de tu producto antes de publicarlo.</label>
                        <button type="submit" class="btn btn-success float-right" id="btnPublicar">Publicar producto</button>
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