<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery-3.5.1.slim.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
	<title></title>
</head>
<body style=  "background-size: 100%; background-image:url('{{ asset('img/FONDOcolor.jpg') }}');position:relative; ">
	<img src="img/logo.jpg" width="37%" align="left" style="background-position: center; margin-top: 2px; width: 430px; height: 330px;">
	
	<table align="center" 
	style="background-position: center; margin-top: 60px; width: 900px; height: 230px;"
	 class="table table-striped">
		
	
  <thead>
    <tr style="background-color: ;">
    	
    </style>

      <th scope="col">fecha_publicacion</th>
      <th scope="col">ruta_img</th>
      <th scope="col">producto</th>
      <th scope="col">detalles</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($productos as $p)
  
    <tr>
      <td>{{$p->fecha_publicacion}}</td>
      <td>{{$p->ruta_img}}</td>
      <td>{{$p->producto}}</td>
      <td>{{$p->detalles}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
	
</body>
</html>