<!DOCTYPE html>
<html lang="en">
<head>
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--FontAwesome-->
    <script src="https://kit.fontawesome.com/d4ba555f74.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LLevelo - Productos Publicados</title>
    
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
            box-shadow: 3px 3px 5px lightgrey;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row mt-3">
            <div class="col-10"><h3>Productos publicados</h3></div>
            <div class="col-1">
                <button type="button" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Publicar Producto</button>
                 
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control" id="InputBuscar" placeholder="Buscar productos">
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col">
                <div class="card" id="Producto">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-2 mt-1">
                                <img src="img/fondo.jpg" width="100%" class="text-right">
                            </div>
                            <div class="col-4 mt-1">
                                <h5 class="card-title mt-6">Chicle masticados</h5>
                                <p class="card-text">Fecha de publicación: 20 jun.2019</p>
                            </div>
                            <div class="col-2 mt-4">
                                <p class="card-text"> <b>Precio:</b> $50,000</p>
                            </div>
                            <div class="col-3 mt-2">
                                <p class="card-text"> <b>Unidades:</b> 10</p>
                                <p class="card-text"> <b>Vendidos:</b> 0</p>
                            </div>
                           
                            <div class="col-1 mt-4">
                                <div class="dropdown">
                                    <button class="btn dropdown btn-warning" type="button" id="dropdownOpciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownOpciones">
                                        <button class="dropdown-item" type="button">Modificar Producto</button>
                                        <button class="dropdown-item" type="button">Ver producto</button>
                                        <button class="dropdown-item" type="button">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                       
                </div>
            </div>                                       
            </div>
        </div>
    </div>

    <script>
        $('.dropdown').dropdown();
        
    </script>
    <script>
       $(document).ready(function(){
            $("#InputBuscar").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#Producto .card-title").filter(function() {
                    $("#Producto").toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>
</html>



