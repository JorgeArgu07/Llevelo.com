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
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
body {
	color: #fff;
	background: #d47677;
}
.form-control {
	min-height: 41px;
	background: #fff;
	box-shadow: none !important;
	border-color: #e3e3e3;
}
.form-control:focus {
	border-color: #70c5c0;
}
.form-control, .btn {        
	border-radius: 2px;
}
.login-form {
	width: 350px;
	margin: 0 auto;
	padding: 100px 0 30px;		
}
.login-form form {
	color: #7a7a7a;
	border-radius: 2px;
	margin-bottom: 15px;
	font-size: 13px;
	background: #FCFFA3;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;	
	position: relative;	
    border-radius:5%;
}
.login-form h2 {
	font-size: 22px;
	margin: 35px 0 25px;
}
.login-form .avatar {
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -50px;
	width: 95px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #FFFFFF;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.login-form .avatar img {
	width: 100%;
}	
.login-form input[type="checkbox"] {
	position: relative;
	top: 1px;
}
.login-form .btn, .login-form .btn:active {        

}
.login-form .btn:hover, .login-form .btn:focus {
	background: #50b8b3 !important;
}    
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #7a7a7a;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
.login-form .bottom-action {
	font-size: 14px;
}
</style>
</head>

<body style=  "background-size: 100%; background-image:url('{{ asset('img/fondologin.png') }}');position:relative; ">
<div class="vl"></div>


<div class="vl"></div>

<div class="container" style="height: 100%;">
<br><br><br><br>  
<aside class="col-sm-1">
	</aside> 
<div class="row ">
	<aside class="col-sm-4">
<div>
	 <form>
    <div class="form-group">
    </div> 
    <div class="form-group">	
    </div> 
    <div class="form-group"> 
    <div class="checkbox">
    </div> 
    </div>                                                   
</form>
</div> 
	</aside>
	<aside class="col-sm-3">
	</aside> 
	<aside class="col-4">
    <div class="row">
    

						
    <div class="login-form">
<form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="avatar">
                        <img src="img/camara.png" width="40%"alt="Avatar">
		</div>
        <br>
        <center>
        <h3>Bienvenido</h3>
        <center>
        <br>
                        <div class="form-group row">
                        
                            <label  for="email" class="col-md-2 col-form-label text-md-right"><i class="fas fa-user"></i></i></label>
                        

                            <div class="col-md-9">
                             <input id="email" type="email" placeholder="Correo electronico" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>  
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right"><i class="fas fa-key"></i></label>

                            <div class="col-md-9">
                                <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                        
                            <div class="col-md-5 offset-md-4 ">
                            
                                <button type="submit" class="btn btn-success" style="border-radius:10%;">
                                    {{ __('Ingresar') }}
                                </button>
                            
                                {{--@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                                    </a>
                                @endif--}}
                            </div>
                            
                        </div>
                        <br><br>
                            <center>
                            <a>¿No estas registrado?,</a><a href="http://llevelo.com/register">Registrate aqui.</a>
                            </center>
                            
                    </form>
</article>
</div> 
	</aside> 
</div> 

</div> 


</body>
@endsection
