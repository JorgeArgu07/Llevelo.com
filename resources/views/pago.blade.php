@extends('layouts.app')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">



<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>


<div class="container">
<div class="card" style="width:1100px;">
<div class="card-body">
<h3 class="card-title">Envio y pago</h3>
</div>
</div>
<div class="card" style="width:730px;">
<div class="card-body">
<h3 class="card-title">Forma de pago</h3>
<br>
<input type=image src="img/Tarjeta.png"   width="160" height="80"> 
<input type=image src="img/paypal.jpg"   width="160" height="80"> 
<input type=image src="img/Tarjeta.png"   width="160" height="80"> 

<div class="card-group">
<div class="row">
  <div class="col-sm-6">
    <div class="card" style="background-color: rgb(255, 251, 187,0);opacity: 80%; border-radius:5%; height:250px;  width:337px" >
      <div class="card-body">
      <br><br>
      <label for="inputEmail4">Numero de la tarjeta</label>
      <input type="text" class="form-control" aria-label="Sizing example input" placeholder="0000 0000 0000 0000" aria-describedby="inputGroupMaterial-sizing-sm" style="width:240px">
      <br>
      <div class="form-group col-md-6">
      <label for="inputEmail4">Titular de la tarjeta</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="" style="width:130px">
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Caducidad</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="MM/AA"style="width:130px">
    </div>
      </div>
    </div>
  </div>

  <div class="col-6">
  <div class="card" style="background-color: rgb(255, 251, 187,0);opacity: 80%; border-radius:5%; height:250px;  width:337px" >
      <div class="card-body">
      <br><br>
      <br>
      <div class="form-group col-md-6">
     
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">CVV</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="000"style="width:130px">
    </div>
      </div>
  </div>
  
</div>
  </div>
</div>
<br><br>
<center>
<button type="button" class="btn btn-danger">Realizar pago</button>
<center>
</div>



