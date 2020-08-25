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
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">

</head>
<body style=  "background-size: 100%; background-image:url('{{ asset('img/FONDOcolor.jpg') }}');position:relative; ">
	<img src="img/logo.jpg" width="37%" align="left" style="background-position: center; margin-top: 2px; width: 430px; height: 330px;">
	
	<table align="center" 
	style="background-position: center; margin-top: 60px; width: 900px; height: 230px;"
	 class="table table-striped">
	<thead>
	 	<tr style="background-color: blue;">
	 		<th scope="col">fecha_pedido</th>
	 		<th scope="col">subtotal</th>
	 		<th scope="col">estatus</th>
	 		<th scope="col">detalles</th>
	 	</tr>
	</thead>
	<tbody>
  	@foreach($pedidos as $p)
    <tr>
      <td>{{$p->fecha_pedido}}</td>
      <td>{{$p->subtotal}}</td>
      <td>ggggg</td>
      <td><button class="btn btn-warning" href="/productos" role="button">jjj</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<button type="" class="btn btn-warning">gera</button>
</body>
</html>